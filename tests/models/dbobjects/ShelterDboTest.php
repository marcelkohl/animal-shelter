<?php
use App\Model\Collection\ShelterCollection;

use App\Model\DBObject\ShelterDbo;

class ShelterDbotest extends Slim3TestCase
{
    /**
     * the id of the shelter to be used as reference to test, must exist on database
     * @var int
     */
    private $singleShelterId;

    public function setUp()
    {
        parent::setUp();
        $this->singleShelterId = 1;
    }

    /**
     * commit test
     */
    public function testCommit()
    {
        $shelter = new ShelterDbo($this->app->getContainer()->get("db"));
        $shelter->setName("Shelter test");

        $this->assertTrue($shelter->commit(), "Commit MUST be successful and return true");
        $this->assertInternalType("int", $shelter->getId(), "Shelter record MUST have an Integer as Id after commit");
        $this->assertGreaterThan(0, $shelter->getId(), "Committed instance MUST have an Id greater than zero");
        $this->assertEquals("Shelter test", $shelter->getName(), "Committed instance MUST match the committed string name");
    }

    /**
     * getById test
     */
    public function testGetById()
    {
        $shelter = ShelterDbo::getById($this->app->getContainer()->get("db"), $this->singleShelterId);

        $this->assertInstanceOf(ShelterDbo::class, $shelter, "getById MUST return a ShelterDbo instance");
    }

    /**
     * mark as deleted test
     */
    public function testDelete()
    {
        $shelter = ShelterDbo::getById($this->app->getContainer()->get("db"), 1);

        $shelter->setDeleted(true);
        $shelter->commit();
        $this->assertTrue($shelter->isDeleted(), "deleted status of the instance MUST be true");

        $shelter->setDeleted(false);
        $shelter->commit();
        $this->assertFalse($shelter->isDeleted(), "deleted status of the instance MUST be false");
    }

    /**
     * get all test
     */
    public function testGetAll()
    {
        $shelters = ShelterDbo::getAll($this->app->getContainer()->get("db"));

        $this->assertInstanceOf(ShelterCollection::class, $shelters, "getAll MUST return a ShelterCollection instance");
    }
}

<?php

use App\Model\ShelterModel;
use App\Model\DBObject\ShelterDbo;

class ShelterModeltest extends Slim3TestCase
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
     * serialize dbo test
     */
    public function testSerializeDbo()
    {
        $shelter = ShelterDbo::getById($this->app->getContainer()->get("db"), $this->singleShelterId);
        $shelterModel = new ShelterModel($this->app->getContainer()->get("db"));

        $serialized = $shelterModel->serializeDbo($shelter);

        $this->assertEquals($shelter->getId(), $serialized["id"], "Serialized Id MUST match Dbo Id");
        $this->assertEquals($shelter->getName(), $serialized["name"], "Serialized Name MUST match Dbo Name");
    }

    /**
     * add shelter dbo test
     */
    public function testAddShelter()
    {
        $shelterModel = new ShelterModel($this->app->getContainer()->get("db"));
        $shelterName = "shelter unit test";
        $addedShelter = $shelterModel->addShelter($shelterName);

        $dbShelter = ShelterDbo::getById($this->app->getContainer()->get("db"), $addedShelter->getId());

        $this->assertInstanceOf(ShelterDbo::class, $dbShelter, "Shelter instance MUST match model added shelter");
        $this->assertEquals($addedShelter->getId(), $dbShelter->getId(), "added shelter Id MUST match Db instantiated Id");
    }
}

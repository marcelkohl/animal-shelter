<?php

namespace App\Model\DBObject;

use App\Model\Collection\ShelterCollection;

class ShelterDbo extends BaseDbo implements DboInterface
{
    /** @var int */
    private $id = 0;
    /** @var string */
    private $name = "";
    /** @var bool */
    private $isDeleted = false;

    /**
     * ShelterDbo Constructor
     * @param mixed $db   database instance
     */
    public function __construct($db)
    {
        parent::__construct($db);
    }

    /**
     * return a list of all shelters
     * @param  mixed                $db     a database instance
     * @return ShelterCollection
     */
    public static function getAll($db):ShelterCollection
    {
        $sql = "SELECT * FROM shelters WHERE deleted = 0";

        $statement = $db->prepare($sql);
        $statement->execute();

        $shelters = new ShelterCollection();

        while ($row = $statement->fetch()) {
            $shelter = new ShelterDbo($db);
            $shelter->setId($row->id);
            $shelter->setName($row->name);
            $shelter->setDeleted((bool) $row->deleted);

            $shelters->add($shelter);
        }

        return $shelters;
    }

    /**
     * returns a shelter db object based on the id
     * @param  [type]     $db           [description]
     * @param  int        $shelterId    [description]
     * @return ShelterDbo|null          [description]
     */
    public static function getById($db, int $shelterId): ?ShelterDbo
    {
        $sql = "SELECT * FROM shelters WHERE id = :shelterId AND deleted = 0 LIMIT 1";

        $statement = $db->prepare($sql);
        $statement->bindParam(':shelterId', $shelterId, \PDO::PARAM_INT);
        $statement->execute();

        $record = $statement->fetch();

        if ($record) {
            $shelter = new ShelterDbo($db);
            $shelter->setId($record->id);
            $shelter->setName($record->name);
            $shelter->setDeleted((bool) $record->deleted);
        } else {
            $shelter = null;
        }

        return $shelter;
    }

    /**
     * set shelter's id
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * get shelter's Id
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * set shelter's name
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * get shelter's name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * set the instance as deleted
     * @param bool $idDeleted   if deleted = true, if not = false
     */
    public function setDeleted(bool $idDeleted)
    {
        $this->isDeleted = $idDeleted;
    }

    /**
     * returns if this instance is marked as deleted
     * @return bool if deleted = true, if not = false
     */
    public function isDeleted():bool
    {
        return $this->isDeleted;
    }

    /**
     * commit the changes made on the instance to the database
     * @return bool returns true if commit was successful or fals if not
     */
    public function commit():bool
    {
        $isNewRecord = $this->getId() === 0;

        if (!$isNewRecord) {
            $sql = "UPDATE shelters SET name = :shelterName, deleted = :isDeleted WHERE id = :shelterId";
        } else {
            $sql = "INSERT INTO shelters (name, deleted) VALUES (:shelterName, :isDeleted)";
        }

        $statement = $this->getDb()->prepare($sql);

        if (!$isNewRecord) {
            $statement->bindValue(':shelterId', $this->getId(), \PDO::PARAM_INT);
        }

        $statement->bindValue(':shelterName', $this->getName(), \PDO::PARAM_STR);
        $statement->bindValue(':isDeleted', (int) $this->isDeleted(), \PDO::PARAM_INT);

        $executionStatus = $statement->execute();

        if ($executionStatus === true && $isNewRecord) {
            $this->setId($this->getDb()->lastInsertId());
        }

        return $executionStatus;
    }
}

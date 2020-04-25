<?php

namespace App\Model\DBObject;

/**
 * base structure for Database Object
 */
class BaseDbo
{
    /** @var mixed database instance */
    private $db;

    /**
     * constructor
     * @param mixed $db database instance
     */
    public function __construct($db)
    {
        $this->db = $db;
    }

    /**
     * getter for database property
     * @return mixed
     */
    public final function getDb()
    {
        return $this->db;
    }
}

<?php
namespace App\Model;

/**
 * base model
 */
class BaseModel
{
    /** @var mixed database instance */
    protected $db;

    /**
     * constructor
     * @param mixed $db database instance
     */
    public function __construct($db)
    {
        $this->db = $db;
    }
}

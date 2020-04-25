<?php

namespace App\Model\DBObject;

/**
 * database object interface
 */
interface DboInterface
{
    /**
     * commit method, which will take care to save data from instance into the database
     * @return bool must return true if everything is fine, otherwise return false
     */
    public function commit():bool;
}

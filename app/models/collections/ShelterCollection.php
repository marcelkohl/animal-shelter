<?php
namespace App\Model\Collection;

use App\Model\DBObject\ShelterDbo;
use App\Model\Collection\BaseCollection;

class ShelterCollection extends BaseCollection
{
    /**
     * adds an item into the collection
     *
     * @param ShelterDbo    $shelter    object to be added to the collection
     * @param mixed         $key        optional key as index
     */
    public function add($shelter, $key = null)
    {
        if ($shelter instanceof ShelterDbo) {
            parent::add($shelter, $key ?? $shelter->getId());
        }
    }
}

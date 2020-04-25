<?php
namespace App\Model;

use App\Model\DBObject\ShelterDbo;

/**
 * sheltr model
 */
class ShelterModel extends BaseModel
{
    /**
     * add a shelter into the db
     * @param string $name name of the new shelter
     * @return ShelterDbo|null  returns an instance of the new created Shelter if the record is successfully saved
     */
    public function addShelter(string $name) : ?ShelterDbo
    {
        $shelterName = $name;

        $shelter = new ShelterDbo($this->db);
        $shelter->setName($name);

        if ($shelter->commit()) {
            return $shelter;
        } else {
            return null;
        }
    }

    /**
     * serialize a ShelterDbo into a right structure to be returned to frontend
     * @param  ShelterDbo|null $shelter
     * @return array    array structure expected on frontend
     */
    public function serializeDbo(?ShelterDbo $shelter):array
    {
        if ($shelter) {
            return [
                'id' => $shelter->getId(),
                'name' => $shelter->getName(),
            ];
        } else {
            return [];
        }
    }
}

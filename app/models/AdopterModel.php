<?php
namespace App\Model;

/**
 * adopter model
 */
class AdopterModel extends BaseModel
{
    /**
     * dummy list for adopters
     * @return mixed[]
     */
    public function getAdoptersList()
    {
        // TODO: get from DBO
        return [
            $this->getAdopter(),
        ];
    }

    /**
     * dummy getter for adopter data
     * @return mixed[]
     */
    public function getAdopter()
    {
        return [
            'id' => 1,
            'name' => "adopter name here",
            'email' => "adopteremail@email.com",
            'phone' => "17700991122",
            'animalId' => 1,
        ];
    }
}

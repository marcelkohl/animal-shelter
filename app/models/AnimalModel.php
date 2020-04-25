<?php
namespace App\Model;

/**
 * animal model
 */
class AnimalModel extends BaseModel
{
    /**
     * dummy list for animals
     * @return mixed[]
     */
    public function getAnimalsList()
    {
        // TODO: get from DBO
        return [
            $this->getAnimal(),
        ];
    }

    /**
     * dummy getter for animal record
     * @return mixed[]
     */
    public function getAnimal()
    {
        return [
            'id' => 1,
            'shelterId' => 1,
            'picture' => "picture-host/the-picture.png",
            'medicalCondition' => "good",
            'temporaryName' => "snoopy",
            'suposedRace' => "beagle",
            'adoptable' => true,
        ];
    }
}

<?php
// Routes

$app->get('/', 'App\Controller\IndexController:index');

$app->group('/v1', function () {
    $this->group('/shelter', function () {
        $this->get('/list[/]', 'App\Controller\ShelterController:getShelterList');
        $this->post('[/]', 'App\Controller\ShelterController:addShelter');
        $this->get('/{id:[0-9]+}[/]', 'App\Controller\ShelterController:getShelterById');
        $this->delete('/{id:[0-9]+}[/]', 'App\Controller\ShelterController:deleteShelter');
        $this->get('/{id:[0-9]+}/animals[/]', 'App\Controller\ShelterController:getShelterAnimalsList');
    });

    $this->group('/animal', function () {
        $this->get('/list[/]', 'App\Controller\AnimalController:getAnimalList');
        $this->post('[/]', 'App\Controller\AnimalController:addAnimal');
        $this->get('/{id:[0-9]+}[/]', 'App\Controller\AnimalController:getAnimalById');
        $this->delete('/{id:[0-9]+}[/]', 'App\Controller\AnimalController:deleteAnimal');
        $this->patch('/{id:[0-9]+}/adoptable[/]', 'App\Controller\AnimalController:setAnimalAsAdoptable');
        $this->post('/{id:[0-9]+}/adoptionRequest[/]', 'App\Controller\AnimalController:requestAnimalAdoption');
        $this->delete('/{id:[0-9]+}/adoptionRequest[/]', 'App\Controller\AnimalController:removeRequestAnimalAdoption');
    });

    $this->group('/adopter', function () {
        $this->get('/list[/]', 'App\Controller\AdopterController:getAdopterList');
    });

    $this->group('/worker', function () {
        $this->post('[/]', 'App\Controller\WorkerController:addWorker');
        $this->delete('/{id:[0-9]+}[/]', 'App\Controller\WorkerController:deleteWorker');
    });
});

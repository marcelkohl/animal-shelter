<?php
namespace App\Controller;

use App\Model\AnimalModel;
use App\Model\DBObject\ShelterDbo;

use App\Model\ShelterModel;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class ShelterController extends ApiBaseController
{
    /**
     * returns the shelter list
     *
     * @param  Request  $request
     * @param  Response $response
     * @param  mixed    $args
     *
     * @return Response
     */
    public function getShelterList(Request $request, Response $response, $args)
    {
        $shelterModel = new ShelterModel($this->db);
        $shelters = [];

        foreach (ShelterDbo::getAll($this->db) as $shelterDbo) {
            $shelters[] = $shelterModel->serializeDbo($shelterDbo);
        }

        return $response->withJson($shelters, 200);
    }

    /**
     * add a a new shelter
     *
     * @param Request  $request
     * @param Response $response
     * @param mixed   $args
     *
     * @return Response
     * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Status/501
     * @see https://restfulapi.net/http-status-201-created/
     */
    public function addShelter(Request $request, Response $response, $args)
    {
        $shelterName = $this->getAttributeFromRequest($request, "name");

        if ($shelterName) {
            $shelterModel = new ShelterModel($this->db);
            $newShelter = $shelterModel->addShelter($shelterName);

            if ($newShelter) {
                return $response->withJson($shelterModel->serializeDbo($newShelter), 201);
            } else {
                return $response->withStatus(500, "Internal server error");
            }
        } else {
            return $response->withStatus(400, "Invalid data sent");
        }
    }

    /**
     * returns a shelter based on the id sent on the uri path
     *
     * @param  Request  $request
     * @param  Response $response
     * @param  mixed    $args
     *
     * @return Response
     */
    public function getShelterById(Request $request, Response $response, $args)
    {
        $requestedId = $this->getAttributeFromArgs($args, "id", 0);
        $shelter = ShelterDbo::getById($this->db, $requestedId);

        if ($shelter) {
            $shelterModel = new ShelterModel($this->db);
            return $response->withJson($shelterModel->serializeDbo($shelter), 200);
        } else {
            return $response->withStatus(404, "Shelter not found with this Id");
        }
    }

    /**
     * delete a shelter based on the id sent on the uri path
     *
     * @param  Request  $request
     * @param  Response $response
     * @param  mixed    $args
     *
     * @return Response
     * @see https://restfulapi.net/http-status-204-no-content/
     */
    public function deleteShelter(Request $request, Response $response, $args)
    {
        return $response->withStatus(204, "Shelter Deleted successfully");
    }

    /**
     * returns the animal list of a specific shelter
     *
     * @param  Request  $request
     * @param  Response $response
     * @param  mixed    $args
     *
     * @return Response
     */
    public function getShelterAnimalsList(Request $request, Response $response, $args)
    {
        $animalModel = new AnimalModel($this->db);

        return $response->withJson($animalModel->getAnimalsList(), 200);
    }
}

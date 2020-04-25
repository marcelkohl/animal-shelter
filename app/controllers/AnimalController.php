<?php
namespace App\Controller;

use App\Model\AnimalModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class AnimalController extends ApiBaseController
{
    /**
     * returns the animal list
     *
     * @param  Request  $request
     * @param  Response $response
     * @param  mixed    $args
     *
     * @return Response
     */
    public function getAnimalList(Request $request, Response $response, $args)
    {
        $animalModel = new AnimalModel($this->db);

        return $response->withJson($animalModel->getAnimalsList(), 200);
    }

    /**
     * add a a new animal
     *
     * @param Request  $request
     * @param Response $response
     * @param mixed   $args
     *
     * @return Response
     * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Status/501
     * @see https://restfulapi.net/http-status-201-created/
     */
    public function addAnimal(Request $request, Response $response, $args)
    {
        return $response->withStatus(405, "Not allowed at the moment");
    }

    /**
     * returns an animal based on the id sent on the uri path
     *
     * @param  Request  $request
     * @param  Response $response
     * @param  mixed    $args
     *
     * @return Response
     */
    public function getAnimalById(Request $request, Response $response, $args)
    {
        $requestedId = (int) $args['id'];

        $animalModel = new AnimalModel($this->db);
        $animal = $animalModel->getAnimal();

        return $response->withJson($animal, 200);
    }

    /**
     * delete an animal based on the id sent on the uri path
     *
     * @param  Request  $request
     * @param  Response $response
     * @param  mixed    $args
     *
     * @return Response
     * @see https://restfulapi.net/http-status-204-no-content/
     */
    public function deleteAnimal(Request $request, Response $response, $args)
    {
        return $response->withStatus(204, "Animal Deleted successfully");
    }

    /**
     * set animal as adoptable based on the id sent on the uri path
     *
     * @param  Request  $request
     * @param  Response $response
     * @param  mixed    $args
     *
     * @return Response
     * @see https://restfulapi.net/http-status-204-no-content/
     */
    public function setAnimalAsAdoptable(Request $request, Response $response, $args)
    {
        return $response->withStatus(204, "Animal updated successfully");
    }

    /**
     * request to adopt an animal based on the id sent on the uri path
     *
     * @param  Request  $request
     * @param  Response $response
     * @param  mixed    $args
     *
     * @return Response
     * @see https://restfulapi.net/http-status-204-no-content/
     * @see https://www.bennadel.com/blog/2434-http-status-codes-for-invalid-data-400-vs-422.htm
     */
    public function requestAnimalAdoption(Request $request, Response $response, $args)
    {
        //TODO: check if animal isn't already requested to adopt
            //TODO: add requester to db if it does not exist
            //TODO: create request relation between new requester and the animal
        return $response->withStatus(204, "Requested successfully");
    }

    /**
     * Remove the actual request for adoption for an specific animal
     *
     * @param  Request  $request
     * @param  Response $response
     * @param  mixed    $args
     *
     * @return Response
     * @see https://restfulapi.net/http-status-204-no-content/
     */
    public function removeRequestAnimalAdoption(Request $request, Response $response, $args)
    {
        return $response->withStatus(204, "Requested removed successfully");
    }
}

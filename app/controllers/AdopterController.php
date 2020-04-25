<?php
namespace App\Controller;

use App\Model\AdopterModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class AdopterController extends ApiBaseController
{
    /**
     * returns the adopter list, with the active adopters
     *
     * @param  Request  $request
     * @param  Response $response
     * @param  mixed    $args
     *
     * @return Response
     */
    public function getAdopterList(Request $request, Response $response, $args)
    {
        $adopterModel = new AdopterModel($this->db);

        return $response->withJson($adopterModel->getAdoptersList(), 200);
    }
}

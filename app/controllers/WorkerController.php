<?php
namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class WorkerController extends ApiBaseController
{
    /**
     * add a a new worker
     *
     * @param Request  $request
     * @param Response $response
     * @param mixed   $args
     *
     * @return Response
     * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Status/501
     * @see https://restfulapi.net/http-status-201-created/
     */
    public function addWorker(Request $request, Response $response, $args)
    {
        return $response->withStatus(405, "Not allowed at the moment");
    }

    /**
     * delete a worker based on the id sent on the uri path
     *
     * @param  Request  $request
     * @param  Response $response
     * @param  mixed    $args
     *
     * @return Response
     * @see https://restfulapi.net/http-status-204-no-content/
     */
    public function deleteWorker(Request $request, Response $response, $args)
    {
        return $response->withStatus(204, "Worker Deleted successfully");
    }
}

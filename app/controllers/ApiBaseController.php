<?php
namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;

/**
 * implementation of the base methods for the api controllers
 */
class ApiBaseController
{
    protected $logger;

    /**
     * constructor
     * @param mixed $container slim container data structure
     */
    public function __construct($container)
    {
        $this->db = $container->get('db');
        $this->logger = $container->get('logger');
    }

    /**
     * get an attribute from a post/get request. returns a default value if does not exist
     * @param  Request $request         the request object
     * @param  string  $attributeName   attribute to be read from teh request
     * @param  mixed   $default         the default value if the attribute is not found
     * @return mixed
     */
    public function getAttributeFromRequest(Request $request, string $attributeName, $default = null)
    {
        $attributes = $request->getParsedBody();

        return array_key_exists($attributeName, $attributes) ? $attributes[$attributeName] : $default;
    }

    /**
     * get an attribute from the arguments sent on the url/path. returns a default value if does not exist
     * @param  mixed[] $args            the array of arguments
     * @param  string  $attributeName   attribute to be read from the args
     * @param  mixed   $default         the default value if the attribute is not found
     * @return mixed
     */
    public function getAttributeFromArgs($args, string $attributeName, $default = null)
    {
        return array_key_exists($attributeName, $args) ? $args[$attributeName] : $default;
    }
}

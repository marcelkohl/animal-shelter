<?php
//Settings to make all errors more obvious during testing
error_reporting(-1);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once 'vendor/autoload.php';

class Slim3TestCase extends PHPUnit_Framework_TestCase
{
    protected $app;

    public function setUp()
    {
        // Instantiate the app SomeWordx 
        $settings = require 'tests/settings.php';
        $app = new \Slim\App($settings);

        // Set up dependencies
        require 'app/dependencies.php';

        // Register middleware
        require 'app/middleware.php';

        // Register routes
        require 'app/routes.php';
        $this->app = $app;
    }
}

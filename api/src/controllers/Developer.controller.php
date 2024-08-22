<?php

require_once __DIR__ . '/../services/Developer.service.php';
require_once __DIR__ . '/utils/ResponseMethods.php';

class DeveloperController {

    private $requestMethod;
    private $developerService;

    private static $instance = null;

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function __construct() {
        $this->developerService = DeveloperService::getInstance();
    }

    public function processRequest() {
        $this->requestMethod = $_SERVER['REQUEST_METHOD'];

        if ($this->requestMethod === 'GET') {
            $this->getCase();
        } else {
            ResponseMethods::printError(400);
        }
    }

    //HTTP methods cases

    private function getCase() {
        $this->listDevelopers();
    }

    //Private methods

    private function listDevelopers() {
        try {
            $developers = $this->developerService->listDevelopers();

            if ((gettype($developers) === 'array') && is_array($developers)) {
                if (sizeof($developers) > 0) {
                    ResponseMethods::printJSON("SUCCESS", $developers);
                } else {
                    ResponseMethods::printJSON("NOTFOUND");
                }
            } else {
                ResponseMethods::printError(500, "An unexpected error occurred...");
            }
        } catch (Exception $ex) {
            //Add exception message to Log.
            ResponseMethods::printError(500, "An unexpected error occurred...");
        }
    }
}

<?php

require_once __DIR__ . '/src/controllers/Developer.controller.php';

$developerController = DeveloperController::getInstance();
$developerController->processRequest();

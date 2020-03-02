<?php

/**
 * Front controller
 **/

/**
 * Composer
 */
require dirname(__DIR__) . '/vendor/autoload.php';

/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');


/**
 * Routing
 */
$router = (new \Config\Routing())->getRouter();

$router->dispatch($_SERVER['PATH_INFO']);

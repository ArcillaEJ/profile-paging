<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'ProfileController::index');
$routes->get('/profiles', 'ProfileController::index');
$routes->get('/profiles/create', 'ProfileController::create');
$routes->post('/profiles/store', 'ProfileController::store');
<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');
$routes->get('/', 'Crud::index');
$routes->post('/crear', 'Crud::crear');
$routes->get('/obtenerNombre/(:num)', 'Crud::obtenerNombre/$1');
$routes->post('/actualizar', 'Crud::actualizar');
$routes->get('/eliminar/(:num)', 'Crud::eliminar/$1');


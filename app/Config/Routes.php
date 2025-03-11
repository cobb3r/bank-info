<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Users::index');
$routes->get('index', 'Users::index');
$routes->match(['get', 'post'], 'login', 'Users::login');
$routes->match(['get', 'post'], 'signup', 'Users::signup');
$routes->match(['get', 'post'], 'edit', 'Users::edit');
$routes->match(['get', 'post'], 'delete', 'Users::delete');
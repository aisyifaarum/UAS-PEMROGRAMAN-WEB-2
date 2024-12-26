<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


//  tamu
$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::index');
$routes->post('/home/save', 'Home::save');
service('auth')->routes($routes);


// admin
$routes->group('admin',['filter'=> 'group:admin'],function($routes){
$routes->get('datatamu', 'AdminController::datatamu');
$routes->post('datatamu', "AdminController::create_tamu");
$routes->get('datatamu/(:segment)/edit', 'AdminController::edit_tamu/$1');
$routes->post('datatamu/(:segment)/update', 'AdminController::update_tamu/$1');
$routes->get('datatamu/delete/(:num)', 'AdminController::delete_tamu/$1');
$routes->post('hapus', 'AdminController::delete_tamu');
});

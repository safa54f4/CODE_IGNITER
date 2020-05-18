<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');
// $routes->get('/mahasiswa', 'Mahasiswa::index');
// $routes->get('/auth', 'Auth::index');
// $routes->get('/auth/login', 'Auth::login');
// $routes->post('/auth/login', 'Auth::process');
$routes->get('/api', 'Api::index');
$routes->get('/api/user', 'Api::listUser');
$routes->get('/api/user/(:any)', 'Api::listUser/$1');
$routes->post('/api/user/(:any)/delete', 'Api::deleteUser/$1');
$routes->post('/api/user/(:any)/update', 'Api::updateUser/$1');
$routes->post('/api/user/add', 'Api::addUser');
$routes->post('/api/mahasiswa', 'Api::mahasiswaOne');
$routes->post('/api/mahasiswa/krs', 'Api::mahasiswaKrs');
$routes->post('/api/mahasiswa/jadwal', 'Api::mahasiswaJadwal');
$routes->get('/api/jadwal', 'Api::jadwalList');
$routes->get('/api/jadwal/(:num)', 'Api::jadwalList/$1');
$routes->post('/api/jadwal/add', 'Api::addJadwal');
$routes->post('/api/jadwal/(:num)/delete', 'Api::deleteJadwal/$1');
$routes->post('/api/jadwal/(:num)/update', 'Api::updateJadwal/$1');


$routes->post('/api/auth/login', 'Api::loginAttempt');
$routes->post('/api/auth/user', 'Api::getInfoFromToken');
$routes->post('/api/auth/level', 'Api::getLevel');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

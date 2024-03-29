<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//AUTH
$routes->get('/', 'Auth::index');
$routes->post('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');
$routes->get('/register', 'Auth::register_view');
$routes->post('/registersave', 'Auth::register_save');

//Dashboard
$routes->get('/dashboard','DashboardController::index');


//Barang
$routes->get('/barang','BarangController::index');
$routes->get('/barang/create','BarangController::createview');
$routes->get('/barang/edit/(:any)','BarangController::editview/$1');
$routes->post('/barang/createsave','BarangController::createsave');
$routes->post('/barang/editsave','BarangController::editsave');
$routes->post('/barang/delete','BarangController::delete');

//Jenis Barang
$routes->get('/jenisbarang','JenisBarangController::index');
$routes->get('/jenisbarang/create','JenisBarangController::createview');
$routes->get('/jenisbarang/edit/(:any)','JenisBarangController::editview/$1');
$routes->post('/jenisbarang/createsave','JenisBarangController::createsave');
$routes->post('/jenisbarang/editsave','JenisBarangController::editsave');
$routes->post('/jenisbarang/delete','JenisBarangController::delete');

//User
$routes->get('/user','UserController::index');
$routes->post('/user/createsave','UserController::createsave');
$routes->post('/user/setstatus','UserController::setStatus');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

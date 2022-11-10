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
$routes->setDefaultController('Barcode');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Barcode::index');
$routes->get('/save-barcode', 'Barcode::save');
$routes->get('/preview', 'Barcode::preview');
$routes->get('/produk', 'Produk::index');
$routes->get('/detail-produk', 'Detailproduk::index');
$routes->get('/save-produk', 'Produk::save');
$routes->get('/save-detail-produk', 'Detailproduk::save');
$routes->get('/warna', 'Warna::index');
$routes->get('/save-warna', 'Warna::save');
$routes->get('/save-client', 'Client::save');
$routes->get('/client', 'Client::index');

$routes->get('/save-barcode/(:num)', 'Barcode::save/$1');
$routes->get('/delete-barcode/(:num)', 'Barcode::delete/$1');
$routes->get('/save-produk/(:num)', 'Produk::save/$1');
$routes->get('/delete-produk/(:num)', 'Produk::delete/$1');
$routes->get('/save-detail-produk/(:num)', 'Detailproduk::save/$1');
$routes->get('/delete-detail-produk/(:num)', 'Detailproduk::delete/$1');
$routes->get('/save-warna/(:num)', 'Warna::save/$1');
$routes->get('/delete-warna/(:num)', 'Warna::delete/$1');
$routes->get('/save-client/(:num)', 'Client::save/$1');
$routes->get('/delete-client/(:num)', 'Client::delete/$1');

$routes->post('/save-barcode', 'Barcode::save');
$routes->post('/preview', 'Barcode::preview');
$routes->post('/save-warna', 'Warna::save');
$routes->post('/save-produk', 'Produk::save');
$routes->post('/save-detail-produk', 'Detailproduk::save');
$routes->post('/save-client', 'Client::save');

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

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
// $routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->get('/login', 'Login::index');
$routes->get('/keranjang-berita', 'Keranjang_berita::index');
$routes->get('/anggota', 'Anggota::index');
$routes->get('/pengurus', 'pengurus::index');
$routes->get('/bagiankerja', 'bagiankerja::index');
$routes->get('/operasionalkerja', 'operasionalkerja::index');
$routes->get('/user', 'user::index');

$routes->add('/anggota/getAll', 'Anggota::getAll');
$routes->add('/anggota/getOne', 'Anggota::getOne');
$routes->add('/anggota/add', 'Anggota::add');
$routes->add('/anggota/edit', 'Anggota::edit');
$routes->add('/anggota/remove', 'Anggota::remove');

$routes->add('/bagiankerja/getAll', 'bagiankerja::getAll');
$routes->add('/bagiankerja/getOne', 'bagiankerja::getOne');
$routes->add('/bagiankerja/add', 'bagiankerja::add');
$routes->add('/bagiankerja/edit', 'bagiankerja::edit');
$routes->add('/bagiankerja/remove', 'bagiankerja::remove');

$routes->add('/operasionalkerja/getAll', 'operasionalkerja::getAll');
$routes->add('/operasionalkerja/getOne', 'operasionalkerja::getOne');
$routes->add('/operasionalkerja/add', 'operasionalkerja::add');
$routes->add('/operasionalkerja/edit', 'operasionalkerja::edit');
$routes->add('/operasionalkerja/remove', 'operasionalkerja::remove');

$routes->add('/pengurus/getAll', 'pengurus::getAll');
$routes->add('/pengurus/getOne', 'pengurus::getOne');
$routes->add('/pengurus/add', 'pengurus::add');
$routes->add('/pengurus/edit', 'pengurus::edit');
$routes->add('/pengurus/remove', 'pengurus::remove');

$routes->add('/user/getAll', 'user::getAll');
$routes->add('/user/getOne', 'user::getOne');
$routes->add('/user/add', 'user::add');
$routes->add('/user/edit', 'user::edit');
$routes->add('/user/remove', 'user::remove');



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

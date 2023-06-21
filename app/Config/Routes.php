<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::home');
$routes->get('/default-home', 'Home::defaultHome');
$routes->get('avatar/(:any)', 'AvatarController::show/$1');

// TODO delete later
$routes->get('/superadmin', 'Home::superadmin');

$routes->group('admin', ['filter' => 'group:admin,superadmin'], static function ($routes) {
    $routes->group(
        '',
        ['filter' => ['group:admin,superadmin', 'permission:users.create']],
        static function ($routes) {
            $routes->resource('users');
            $routes->get('/', 'Admin::index');
            $routes->get('users', 'Admin::users');

            $routes->post('lowongan/datatable', 'LowonganAdmin::dt_lowongan');
            $routes->resource('lowongan', ['websafe' => 1, 'controller' => 'LowonganAdmin']);

            $routes->post('surat/datatable', 'SuratAdmin::dt_SuratAdmin');
            $routes->get('surat/download/(:segment)', 'SuratAdmin::download/$1');
            $routes->resource('surat', ['websafe' => 1, 'controller' => 'SuratAdmin']);
        }
    );
});

$routes->group('mahasiswa', ['filter' => 'group:user,superadmin'], static function ($routes) {
    $routes->group(
        '',
        ['filter' => ['group:user,superadmin', 'permission:home.access']],
        static function ($routes) {
            // $routes->resource('users', ['websafe' => 1]);
            $routes->get('/', 'Mahasiswa::index');
            $routes->get('profile', 'ProfileMhs::index');
            $routes->post('profile/deleteImage', 'ProfileMhs::deleteImage');
            $routes->post('profile/saveProfile', 'ProfileMhs::saveProfile');
            $routes->post('profile/saveDetail', 'ProfileMhs::saveDetail');
            $routes->resource('lowongan', ['websafe' => 1, 'controller' => 'LowonganMhs']);

            $routes->post('surat/datatable', 'SuratMhs::dt_SuratMhs');
            $routes->get('surat/download/(:segment)', 'SuratMhs::download/$1');
            $routes->resource('surat', ['websafe' => 1, 'controller' => 'SuratMhs']);

            $routes->post('suratPlot/datatable', 'SuratPlotMhs::dt_SuratPlotMhs');
            $routes->resource('suratPlot', ['websafe' => 1, 'controller' => 'SuratPlotMhs']);
        }
    );
});

$routes->group('api', function($routes) {
    $routes->get('select2Skill', 'Api::select2Skill');
    $routes->post('createselect2Skill', 'Api::createselect2Skill');
    $routes->post('searchPerusahaan', 'Api::searchPerusahaan');

    // TODO delete later
    $routes->post('tes', 'Api::tesApi');
    $routes->get('tes', 'Api::tesApi');
});

service('auth')->routes($routes);

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

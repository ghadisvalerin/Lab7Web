<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->cli('migrations', 'MigrationsCommand::index');
$routes->setAutoRoute(true);
$routes->get('user/login', 'User::login');
$routes->match(['get', 'post'], 'user/login', 'User::login');
$routes->get('ajax', 'AjaxController::index');
$routes->get('ajax/getData', 'AjaxController::getData');
$routes->post('ajax/create', 'AjaxController::create');
$routes->post('ajax/update/(:num)', 'AjaxController::update/$1');
$routes->delete('ajax/delete/(:num)', 'AjaxController::delete/$1');
$routes->get('/', 'Home::index');
$routes->get('/about', 'Page::about');
$routes->get('/artikel', 'Artikel::index');
$routes->get('/artikel/(:segment)', 'Artikel::view/$1');
$routes->get('/contact', 'Page::contact');
$routes->get('/faqs', 'Page::faqs');
$routes->get('/artikel/(:any)', 'Artikel::view/$1');
$routes->get('/contact', 'Page::contact');
$routes->post('/kirim-pesan', 'Page::kirimPesan'); // optional jika ingin proses data
$routes->resource('post'); // di luar group admin
$routes->group('admin', ['filter' => 'auth'], function($routes) {
$routes->get('artikel', 'Artikel::admin_index');
$routes->add('artikel/add', 'Artikel::add');
$routes->add('artikel/edit/(:any)', 'Artikel::edit/$1');
$routes->get('artikel/delete/(:any)', 'Artikel::delete/$1');
$routes->get('/admin/artikel/add', 'Artikel::add');
$routes->post('/admin/artikel/add', 'Artikel::add');


});
$routes->group('api', ['namespace' => 'App\Controllers'], function ($routes) {
$routes->resource('post', ['controller' => 'Post']);
});
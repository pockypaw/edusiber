<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth\Dashboard::index', ['filter' => 'role:admin,mahasiswa,dosen']);
$routes->get('/dashboard', 'Auth\Dashboard::index', ['filter' => 'role:admin,mahasiswa,dosen']);
$routes->get('/about/(:segment)', 'Auth\Users::index/$1');

$routes->get('/pages/about', 'Pages::about');
$routes->get('/pages/contact', 'Pages::contact');
$routes->get('/login', 'Auth\Login::index');
$routes->get('/register', 'Auth\Register::index');
$routes->get('/users', 'Auth\Users::index', ['filter' => 'role:admin,dosen']);
$routes->get('/users/(:num)', 'Auth\Users::detail/$1', ['filter' => 'role:admin,dosen']);
$routes->group('classrooms', function (RouteCollection $routes) {
    $routes->get('/', 'Auth\ClassroomController::index');
    $routes->get('create', 'Auth\ClassroomController::create');
    $routes->post('store', 'Auth\ClassroomController::store');
    $routes->get('edit/(:num)', 'Auth\ClassroomController::edit/$1');
    $routes->post('update/(:num)', 'Auth\ClassroomController::update/$1');
    $routes->get('delete/(:num)', 'Auth\ClassroomController::delete/$1');

    $routes->group('(:num)/materi', function (RouteCollection $routes) {
        $routes->get('/', 'Auth\MateriController::index/$1');
        $routes->get('create', 'Auth\MateriController::create/$1');
        $routes->post('store', 'Auth\MateriController::store/$1');
        $routes->get('edit/(:num)', 'Auth\MateriController::edit/$1/$2');
        $routes->post('update/(:num)', 'Auth\MateriController::update/$1/$2');
        $routes->get('delete/(:num)', 'Auth\MateriController::delete/$1/$2');

        $routes->group('(:num)/upload_files', function (RouteCollection $routes) {
            $routes->get('/', 'Auth\UploadFileController::showByMateri/$1/$2');
            $routes->get('create', 'Auth\UploadFileController::create/$1/$2');
            $routes->post('store', 'Auth\UploadFileController::store/$1/$2');
            $routes->get('delete/(:num)', 'Auth\UploadFileController::delete/$1/$2/$3');
            $routes->get('download/(:num)', 'Auth\UploadFileController::download/$1/$2/$3');
        });
    });
});


$routes->group('discussions', function (RouteCollection $routes) {
    $routes->get('/', 'Auth\DiscussionController::index'); // List discussions
    $routes->get('create', 'Auth\DiscussionController::create'); // Show form to create discussion
    $routes->post('store', 'Auth\DiscussionController::store'); // Store a new discussion
    $routes->get('show/(:num)', 'Auth\DiscussionController::show/$1'); // Show a discussion and replies
    $routes->post('reply', 'Auth\DiscussionController::reply'); // Reply to a discussion
});

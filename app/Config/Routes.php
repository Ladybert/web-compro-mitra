<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// admin routes
$routes->get('/login-admin-page', 'Auth::loginPage');
$routes->post('/admin-page-login-process', 'Auth::login');
$routes->get('/admin-page-logout-process', 'Auth::logout');
$routes->group('admin', ['filter' => 'adminAuth'], function($routes) {
    $routes->get('account', 'Admin::accountPage');
    $routes->post('account/change-password', 'Auth::changePassword');
    $routes->get('dashboard', 'Admin::dashboard');
    $routes->get('content', 'Admin::content');
    $routes->post('content/add-content-process', 'Admin::storeContent');
    $routes->post('content/update-content-process/(:any)', 'Admin::updateContent/$1');
    $routes->post('content/delete/(:any)', 'Admin::deleteContent/$1');
    $routes->get('message', 'Admin::message');
    $routes->post('message/delete/(:any)', 'Admin::deleteMessage/$1');
});

// client-side routes
$routes->get('/', 'Home::index');
$routes->get('/company-profile', 'Home::ComPro');
$routes->get('/contact-page', 'Home::contact');
$routes->post('/contact-page/sending-form-response', 'Home::storeFormContact');

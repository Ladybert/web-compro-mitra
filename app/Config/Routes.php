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
    $routes->get('message', 'Admin::message');
});

// client-side routes
$routes->get('/', 'Home::index');
$routes->get('/company-profile', 'Home::ComPro');
$routes->get('/contact-page', 'Home::contact');

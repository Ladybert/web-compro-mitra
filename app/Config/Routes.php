<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/mitra-langgeng-teknik-company-profile', 'Home::ComPro');
$routes->get('/mitra-langgeng-teknik-contact-page', 'Home::contact');

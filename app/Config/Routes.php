<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/page-about', 'Page::index');
$routes->get('/page-contact', 'Page::contact');
$routes->get('/page-faqs', 'Page::faqs');
$routes->get('/post', 'Post::index');
$routes->get('/post/(:any)', 'Post::viewPost/$1');
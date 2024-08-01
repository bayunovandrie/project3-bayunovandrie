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

// admin
$routes->group('auth', function($routes){
    $routes->get('/', 'Auth::index');
    $routes->post('login', 'Auth::login');
    $routes->get('create-user-login', 'Auth::create_user');
    $routes->get('logout', 'Auth::logout');
});

$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('post', 'PostAdmin::index');
    $routes->get('preview-blog/(:segment)', 'PostAdmin::preview/$1');
    $routes->add('create-blog', 'PostAdmin::create');
    $routes->add('create_blog_ajax', 'PostAdmin::insert_user');
    $routes->add('create-blog', 'PostAdmin::create');
    $routes->add('edit-blog/(:segment)', 'PostAdmin::edit/$1');
    $routes->add('edit_view/(:segment)', 'PostAdmin::edit_view/$1');
    $routes->add('preview-blog/(:segment)', 'PostAdmin::preview/$1');
    $routes->post('delete-blog', 'PostAdmin::delete');
    $routes->get('update-status/(:any)/(:any)', 'PostAdmin::edit_status/$1/$2');
    
    // setting
    $routes->add('user-setting', 'Setting::index');

});
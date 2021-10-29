<?php
$routes->group('/admin', ['namespace' => 'MVP\Users\Controllers'], function($routes) {
    $routes->get('users', 'Admin::index/all');
    $routes->get('users/(:any)', 'Admin::index/$1');
    $routes->post('users/(:any)', 'Admin::indexPost/$1');
    $routes->get('users/(:any)/(:num)', 'Admin::index/$1/$2');
    $routes->post('users/(:any)/(:num)', 'Admin::indexPost/$1/$2');
});
$routes->group('/modal', ['namespace' => 'MVP\Users\Controllers'], function($routes) {
    $routes->get('users/group-del/(:num)', 'Modal::modalDel/$1');
    $routes->post('users/group-del/(:num)', 'Modal::modalDel/$1');
    $routes->get('users/del/(:num)', 'Modal::modalDelUs/$1');
    $routes->post('users/del/(:num)', 'Modal::modalDelUs/$1');
});
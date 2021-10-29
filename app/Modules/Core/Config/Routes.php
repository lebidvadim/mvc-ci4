<?php
$routes->group('admin', ['namespace' => 'MVP\Core\Controllers','filter' => 'login'], function($routes)
{
    $routes->get('', 'Admin::index');
});
$routes->group('cabinet', ['namespace' => 'MVP\Core\Controllers','filter' => 'login'], function($routes)
{
    $routes->get('', 'Cabinet::index');
});
$routes->group('/', ['namespace' => 'MVP\Core\Controllers','filter' => 'login'], function($routes)
{
    $routes->get('', 'Site::index');
    $routes->get('migrate', 'Migrate::index');
});
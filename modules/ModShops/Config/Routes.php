<?php
$routes->group('/cabinet', ['namespace' => 'MVP\Shops\Controllers','filter' => 'role:scorepr,scorest'], function($routes) {
    $routes->get('products', 'Score::productsAll');
    $routes->get('products/add', 'Score::productsAdd');
    $routes->post('products/add', 'Score::productsAddForm');
    $routes->get('products/edit/(:num)', 'Score::productsEdit/$1');
    $routes->post('products/edit/(:num)', 'Score::productsEditForm/$1');
    $routes->get('app/add', 'Score::appAdd');
    $routes->post('app/add', 'Score::appAddForm');
    $routes->get('app', 'Score::appAll');
    $routes->get('app/edit/(:num)', 'Score::appEdit/$1');
    $routes->post('app/edit/(:num)', 'Score::appEditForm/$1');
    $routes->get('app/view/(:num)', 'Score::appView/$1');
});
$routes->group('/cabinet', ['namespace' => 'MVP\Shops\Controllers','filter' => 'role:driver'], function($routes) {
    $routes->get('app-driver', 'Driver::appDriverAll');
    $routes->get('app-driver/edit/(:num)', 'Driver::appDriverEdit/$1');
});
$routes->group('/modal', ['namespace' => 'MVP\Shops\Controllers','filter' => 'role:scorepr,scorest'], function($routes) {
    $routes->get('products/del/(:num)', 'Modal::modalDelProd/$1');
    $routes->post('products/del/(:num)', 'Modal::modalDelProd/$1');
    $routes->get('products/edit/(:num)', 'Modal::modalEditProd/$1');
    $routes->post('products/edit/(:num)', 'Modal::modalEditProd/$1');
    $routes->get('products/add', 'Modal::modalAddProd');
    $routes->post('products/add', 'Modal::modalAddProd');
});
$routes->group('/ajax', ['namespace' => 'MVP\Shops\Controllers'], function($routes) {
    $routes->post('app/add-item', 'Ajax::appAddItem');
    $routes->post('app/select-cat', 'Ajax::appSelectCat');
});
$routes->group('/cron', ['namespace' => 'MVP\Shops\Controllers'], function($routes) {
    $routes->get('app/shape', 'Cron::appShape');
    $routes->get('app/shape-vod', 'Cron::appShapeVod');
});
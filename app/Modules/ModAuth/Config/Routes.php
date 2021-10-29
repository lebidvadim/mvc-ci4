<?php

$routes->group('/', ['namespace' => 'MVP\Auth\Controllers'], function($routes) {

    $routes->get('login', 'Site::login');
    $routes->post('login', 'Site::attemptLogin');
    $routes->get('logout', 'Site::logout');

    $routes->get('register', 'Site::register');
    $routes->post('register', 'Site::attemptRegister');

    $routes->get('activate-account', 'Site::activateAccount');
    $routes->get('resend-activate-account', 'Site::resendActivateAccount');

    $routes->get('forgot', 'Site::forgotPassword');
    $routes->post('forgot', 'Site::attemptForgot');
    $routes->get('reset-password', 'Site::resetPassword');
    $routes->post('reset-password', 'Site::attemptReset');
});
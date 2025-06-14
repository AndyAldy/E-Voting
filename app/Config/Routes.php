<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Default route ke Dashboard
$routes->get('/', 'Dashboard::index', ['filter' => 'auth']);

// AUTH
$routes->group('', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('login', 'Auth::login');
    $routes->post('login', 'Auth::loginPost');
    $routes->get('register', 'Auth::register');
    $routes->post('register', 'Auth::registerPost');
    $routes->get('logout', 'Auth::logout');
});

// DASHBOARD
$routes->get('dashboard', 'Dashboard::index', ['filter' => 'auth']);

// VOTING
$routes->group('vote', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Vote::index');
    $routes->post('submit', 'Vote::submit');
});

// ADMIN
$routes->group('admin', ['filter' => 'admin'], function ($routes) {
    $routes->get('/', 'Admin::index');
    $routes->get('candidates/add', 'Admin::addCandidate');
    $routes->post('candidates/save', 'Admin::saveCandidate');
    $routes->get('results', 'Admin::results');
});

// Tambahkan fallback jika 404
$routes->set404Override();

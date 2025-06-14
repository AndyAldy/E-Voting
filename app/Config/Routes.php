<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Default route ke form kode login
$routes->get('/', 'Auth::kodeLogin');

// AUTH - Ganti dengan sistem kode unik
$routes->get('kode-login', 'Auth::kodeLogin');
$routes->post('kode-login', 'Auth::kodeLoginPost');
$routes->get('logout', 'Auth::logout');

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
    $routes->get('gen-kode', 'Admin::generateKode'); // opsional: auto-generate kode user
});

// Tambahkan fallback jika 404
$routes->set404Override();

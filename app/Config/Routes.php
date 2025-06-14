<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Dashboard::index');

// Auth
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::loginPost');
$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::registerPost');
$routes->get('/logout', 'Auth::logout');

// Dashboard
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);

// Voting
$routes->get('/vote', 'Vote::index', ['filter' => 'auth']);
$routes->post('/vote/submit', 'Vote::submit', ['filter' => 'auth']);

// Admin
$routes->get('/admin', 'Admin::index', ['filter' => 'admin']);
$routes->get('/admin/candidates/add', 'Admin::addCandidate', ['filter' => 'admin']);
$routes->post('/admin/candidates/save', 'Admin::saveCandidate', ['filter' => 'admin']);
$routes->get('/admin/results', 'Admin::results', ['filter' => 'admin']);
<?php

use App\Controllers\VoteController;
use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/', 'VoteController::index');
$routes->post('vote/process-code', 'VoteController::processCode');
$routes->post('vote/submit', 'VoteController::submitVote');
$routes->get('vote/thank-you', 'VoteController::thankYouPage');
$routes->get('logout', 'VoteController::logout');

// Rute Manajemen (Login & Logout Umum)
$routes->get('manage', 'AuthController::loginPage');
$routes->post('manage/process', 'AuthController::processLogin');
$routes->get('logout', 'AuthController::logout');


// --- GRUP ADMIN (Dilindungi oleh Filter 'admin') ---
$routes->group('admin', ['filter' => 'admin'], static function ($routes) {
    $routes->get('/', 'AdminController::dashboard'); // Alias untuk dashboard
    $routes->get('admin_dashboard', 'AdminController::dashboard');
    $routes->get('candidates', 'AdminController::manageCandidates');
    $routes->get('results', 'AdminController::results');
    $routes->get('candidates/add', 'AdminController::addCandidatePage');
    $routes->post('candidates/save', 'AdminController::saveCandidate');
    $routes->post('candidates/delete/(:num)', 'AdminController::deleteCandidate/$1');
    $routes->get('codes/generate', 'AdminController::generateVoterCodes');
});

// --- GRUP KANDIDAT (Dilindungi oleh Filter 'candidate') ---
$routes->group('candidate', ['filter' => 'kandidat'], static function ($routes) {
    $routes->get('/', 'KandidatController::dashboard'); // Alias untuk dashboard
    $routes->get('candidate_dashboard', 'KandidatController::dashboard');
    $routes->post('profile/update', 'KandidatController::updateProfile');
});
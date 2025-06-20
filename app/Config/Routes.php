<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Rute Publik (Pemilih & Halaman Awal)
$routes->get('/', 'VoteController::index');
$routes->post('vote/process-code', 'VoteController::processCode');
$routes->post('vote/submit', 'VoteController::submitVote');
$routes->get('vote/thank-you', 'VoteController::thankYouPage'); // Rute untuk halaman terima kasih

// Rute Manajemen (Login & Logout Umum)
$routes->get('manage', 'AuthController::loginPage');
$routes->post('manage/process', 'AuthController::processLogin');
$routes->get('logout', 'AuthController::logout');


// --- GRUP ADMIN (Dilindungi oleh Filter 'admin') ---
$routes->group('admin', ['filter' => 'admin'], static function ($routes) {
    $routes->get('/', 'AdminController::admin_dashboard');
    $routes->get('results', 'AdminController::results');
    $routes->get('candidates/add', 'AdminController::addCandidatePage');
    $routes->post('candidates/save', 'AdminController::saveCandidate');
    $routes->get('codes/generate', 'AdminController::generateVoterCodes');
});

// --- GRUP KANDIDAT (Dilindungi oleh Filter 'candidate') ---
$routes->group('candidate', ['filter' => 'candidate'], static function ($routes) {
    $routes->get('/', 'KandidatController::candidate_dashboard'); // Alias untuk dashboard
    $routes->get('dashboard', 'KandidatController::candidate_dashboard');
    $routes->post('profile/update', 'KandidatController::updateProfile');
});
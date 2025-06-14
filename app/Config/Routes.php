<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// ALUR UNTUK PEMILIH (VOTER) - Tidak berubah
$routes->get('/', 'VoteController::index');
$routes->post('vote/process-code', 'VoteController::processCode');
$routes->post('vote/submit', 'VoteController::submitVote');

// ALUR LOGIN TERPADU UNTUK ADMIN & KANDIDAT
$routes->get('manage', 'AuthController::loginPage'); // Halaman login terpadu
$routes->post('manage/process', 'AuthController::processLogin');
$routes->get('logout', 'AuthController::logout');

// GRUP RUTE ADMIN (dilindungi filter)
$routes->group('admin', ['filter' => 'admin'], static function ($routes) {
    $routes->get('/', 'AdminController::dashboard');
    $routes->get('results', 'AdminController::results');
    $routes->get('candidates/add', 'AdminController::addCandidatePage');
    $routes->post('candidates/save', 'AdminController::saveCandidate');
    $routes->get('codes/generate', 'AdminController::generateVoterCodes');
});

// GRUP RUTE KANDIDAT (dilindungi filter)
$routes->group('candidate', ['filter' => 'candidate'], static function ($routes) {
    $routes->get('dashboard', 'CandidateController::dashboard');
    $routes->post('profile/update', 'CandidateController::updateProfile');
});

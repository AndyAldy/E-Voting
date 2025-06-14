<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ===================================================================
// ==                  ALUR UNTUK PEMILIH (VOTER)                   ==
// ===================================================================
// Halaman utama website adalah tempat pemilih memasukkan kode unik.
$routes->get('/', 'VoteController::index');

// Rute ini untuk memproses form saat pemilih memasukkan kode uniknya.
$routes->post('vote/process-code', 'VoteController::processCode');

// Rute ini untuk memproses form saat pemilih mengirimkan suaranya.
$routes->post('vote/submit', 'VoteController::submitVote');


// ===================================================================
// ==             ALUR UNTUK ADMIN & KANDIDAT (PRIVATE)             ==
// ===================================================================
// Halaman login khusus untuk Admin dan Kandidat, diakses melalui URL rahasia.
$routes->get('manage', 'AuthController::loginPage');

// Rute untuk memproses form login dari halaman /manage.
$routes->post('manage/process', 'AuthController::processLogin');

// Rute untuk logout Admin dan Kandidat.
$routes->get('logout', 'AuthController::logout');


// ===================================================================
// ==                   RUTE YANG DILINDUNGI FILTER                 ==
// ===================================================================

// Grup rute ADMIN. Semua URL di sini hanya bisa diakses setelah login sebagai admin.
$routes->group('admin', ['filter' => 'admin'], static function ($routes) {
    $routes->get('/', 'AdminController::dashboard'); // Dashboard utama admin
    $routes->get('results', 'AdminController::results'); // Halaman hasil detail pemilihan
    $routes->get('candidates/add', 'AdminController::addCandidatePage'); // Halaman form tambah kandidat
    $routes->post('candidates/save', 'AdminController::saveCandidate'); // Rute untuk menyimpan kandidat baru
    $routes->get('codes/generate', 'AdminController::generateVoterCodes'); // Rute untuk membuat kode pemilih
});

// Grup rute KANDIDAT. Semua URL di sini hanya bisa diakses setelah login sebagai kandidat.
$routes->group('candidate', ['filter' => 'candidate'], static function ($routes) {
    $routes->get('dashboard', 'CandidateController::dashboard'); // Dashboard utama kandidat
    $routes->post('profile/update', 'CandidateController::updateProfile'); // Rute untuk memperbarui profil
});

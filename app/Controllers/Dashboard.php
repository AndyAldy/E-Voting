<?php

namespace App\Controllers;

use App\Models\VoteModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $voteModel = new VoteModel();

        // Ambil ID user dari session
        $userId = $this->session->get('user_id');

        // Cek apakah user sudah voting
        $voted = $voteModel->where('user_id', $userId)->first() ? true : false;

        // Kirim data ke view
        return view('dashboard/index', ['voted' => $voted]);
    }
}

<?php

namespace App\Controllers;

use App\Models\CandidateModel;
use App\Models\VoteModel;

class Vote extends BaseController
{
    public function index()
    {
        $kandidatModel = new CandidateModel();
        $kandidats = $kandidatModel->findAll();
        return view('vote/index', ['candidates' => $kandidats]);
    }

    public function submit()
    {
        $userId = session()->get('user_id');
        $kandidatId = $this->request->getPost('candidate_id');

        $voteModel = new VoteModel();

        // Cek apakah user sudah vote sebelumnya
        $existing = $voteModel->where('user_id', $userId)->first();
        if ($existing) {
            return redirect()->back()->with('error', 'Anda sudah memilih.');
        }

        $voteModel->insert([
            'user_id' => $userId,
            'kandidat_id' => $kandidatId
        ]);

        return redirect()->to('/dashboard')->with('success', 'Vote berhasil!');
    }
}

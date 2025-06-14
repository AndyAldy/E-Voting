<?php
namespace App\Controllers;

use App\Models\CandidateModel;
use App\Models\VoteModel;
use CodeIgniter\Controller;

class Vote extends Controller
{
    public function index()
    {
        $model = new CandidateModel();
        $candidates = $model->findAll();
        return view('vote/index', ['candidates' => $candidates]);
    }

    public function submit()
    {
        $voteModel = new VoteModel();
        $userId = session()->get('user_id');

        // Cek apakah user sudah voting
        if ($voteModel->where('user_id', $userId)->first()) {
            return redirect()->to('/dashboard')->with('error', 'Kamu sudah memilih');
        }

        $voteModel->save([
            'user_id' => $userId,
            'candidate_id' => $this->request->getPost('candidate_id')
        ]);

        return redirect()->to('/dashboard')->with('success', 'Berhasil memilih');
    }
}

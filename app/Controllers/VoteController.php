<?php
namespace App\Controllers;

use App\Models\CandidateModel;
use App\Models\UniqueCodeModel;
use App\Models\VoteModel;

class VoteController extends BaseController
{
    public function index()
    {
        if (session()->get('is_voter')) {
            $candidateModel = new CandidateModel();
            $data['candidates'] = $candidateModel->findAll();
            return view('vote/voting_page', $data);
        }
        return view('vote/enter_code_page');
    }

    public function processCode()
    {
        $codeModel = new UniqueCodeModel();
        // PERBAIKAN: Menggunakan service('request')
        $codeData = $codeModel->where('code', service('request')->getPost('unique_code'))
                              ->where('is_used', 0)->first();

        if ($codeData) {
            session()->set([
                'voter_code_id' => $codeData['id'],
                'is_voter'      => true,
            ]);
            return redirect()->to('/');
        }
        return redirect()->back()->with('error', 'Kode unik tidak valid atau sudah digunakan.');
    }

    public function submitVote()
    {
        if (!session()->get('is_voter')) return redirect()->to('/');

        $voteModel = new VoteModel();
        $voteModel->insert([
            'voter_code_id' => session()->get('voter_code_id'),
            // PERBAIKAN: Menggunakan service('request')
            'candidate_id'  => service('request')->getPost('candidate_id'),
            'voted_at'      => date('Y-m-d H:i:s'),
        ]);

        $codeModel = new UniqueCodeModel();
        $codeModel->update(session()->get('voter_code_id'), ['is_used' => 1]);

        session()->destroy();
        return view('vote/thank_you_page');
    }
}

<?php
namespace App\Controllers;

use App\Models\CandidateModel;
use App\Models\VoteModel;

class Admin extends BaseController
{
    public function index()
    {
        $model = new CandidateModel();
        $data['candidates'] = $model->findAll();
        return view('admin/index', $data);
    }

    public function addCandidate()
    {
        return view('admin/add_candidate');
    }

    public function saveCandidate()
    {
        $model = new CandidateModel();
        $model->save([
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description')
        ]);
        return redirect()->to('/admin');
    }

    public function results()
    {
        $voteModel = new VoteModel();
        $model = new CandidateModel();
        $candidates = $model->findAll();
        $results = [];
        foreach ($candidates as $c) {
            $count = $voteModel->where('candidate_id', $c['id'])->countAllResults();
            $results[] = [
                'name' => $c['name'],
                'votes' => $count
            ];
        }
        return view('admin/result', ['results' => $results]);
    }
}
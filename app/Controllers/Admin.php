<?php

namespace App\Controllers;

use App\Models\CandidateModel;
use App\Models\VoteModel;

class Admin extends BaseController
{
    public function index()
    {
        if ($res = $this->redirectIfNotAdmin()) return $res;
        return view('admin/index');
    }

    public function addCandidate()
    {
        if ($res = $this->redirectIfNotAdmin()) return $res;
        return view('admin/add_candidate');
    }

    public function saveCandidate()
    {
        if ($res = $this->redirectIfNotAdmin()) return $res;

        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required|min_length[3]',
            'visi_misi' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $model = new CandidateModel();
        $model->insert([
            'name' => $this->request->getPost('name'),
            'visi_misi' => $this->request->getPost('visi_misi')
        ]);

        return redirect()->to('/admin');
    }

    public function results()
    {
        if ($res = $this->redirectIfNotAdmin()) return $res;

        $model = new VoteModel();
        $results = $model->select('candidates.name, COUNT(votes.id) as total')
                         ->join('candidates', 'candidates.id = votes.kandidat_id')
                         ->groupBy('votes.kandidat_id')
                         ->findAll();

        return view('admin/results', ['results' => $results]);
    }
    public function generateKode()
{
    helper('text');
    $model = new \App\Models\UserModel();
    $kode = random_string('alnum', 8);
    $model->insert([
        'username' => 'user_' . $kode,
        'unique_code' => $kode,
        'role' => 'user'
    ]);
    return "User baru dibuat dengan kode: $kode";
}

}

<?php

namespace App\Controllers;

use App\Models\KandidatModel;
use App\Models\PemilihModel;
use App\Models\UserModel;

class AdminController extends BaseController
{
    public function dashboard()
    {
        $kandidatModel = new KandidatModel();
        $pemilihModel = new PemilihModel();

        $data['total_kandidat'] = $kandidatModel->countAllResults();
        $data['total_pemilih'] = $pemilihModel->countAllResults();
        
        return view('admin/index', $data);
    }

    public function addCandidatePage()
    {
        return view('admin/add_candidates');
    }

    public function saveCandidate()
    {
        $rules = [
            'name'     => 'required|min_length[3]',
            'username' => 'required|is_unique[users.username]',
            'password' => 'required|min_length[6]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $userModel = new UserModel();
        
        // PERUBAHAN DI SINI: Menggunakan service('request')
        $userData = [
            'name'     => service('request')->getPost('name'),
            'username' => service('request')->getPost('username'),
            'password' => service('request')->getPost('password'),
            'role'     => 'kandidat',
        ];
        
        $userId = $userModel->insert($userData);

        if (!$userId) {
            return redirect()->back()->withInput()->with('error', 'Gagal membuat akun untuk kandidat.');
        }

        $kandidatModel = new KandidatModel();
        $kandidatModel->insert([
            'user_id' => $userId,
            'visi'    => '',
            'misi'    => '',
            'foto'    => 'default.png',
        ]);

        return redirect()->to('/admin/dashboard')->with('success', 'Kandidat baru berhasil ditambahkan.');
    }

    public function results()
    {
        $db = db_connect();
        $builder = $db->table('vote');
        $builder->select('pemilih.kode_unik as kode_pemilih, users.name as nama_kandidat, vote.created_at');
        $builder->join('pemilih', 'pemilih.id = vote.pemilih_id');
        $builder->join('kandidat', 'kandidat.id = vote.kandidat_id');
        $builder->join('users', 'users.id = kandidat.user_id');
        
        $data['hasil_vote'] = $builder->get()->getResultArray();

        return view('admin/hasil', $data);
    }

    public function generateVoterCodes()
    {
        helper('text');
        
        $pemilihModel = new PemilihModel();
        
        // PERUBAHAN DI SINI: Menggunakan service('request')
        $jumlahKode = (int) service('request')->getPost('jumlah');
        
        $kodeTerbuat = 0;

        if ($jumlahKode <= 0) {
            return redirect()->to('/admin/dashboard')->with('error', 'Jumlah kode harus lebih dari 0.');
        }

        for ($i = 0; $i < $jumlahKode; $i++) {
            $kode = random_string('alnum', 8);

            $dataPemilih = [
                'nama'          => 'Pemilih-' . $kode,
                'kode_unik'     => $kode,
                'sudah_memilih' => 0,
            ];
            $pemilihModel->insert($dataPemilih);
            $kodeTerbuat++;
        }

        return redirect()->to('/admin/dashboard')->with('success', "$kodeTerbuat kode pemilih baru berhasil dibuat.");
    }
}
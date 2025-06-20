<?php

namespace App\Controllers;

use App\Models\KandidatModel;
use App\Models\PemilihModel;
use App\Models\UserModel;
use App\Models\VoteModel;

class AdminController extends BaseController
{
    public function dashboard()
    {
        $kandidatModel = new KandidatModel();
        $pemilihModel = new PemilihModel();

        $data['total_kandidat'] = $kandidatModel->countAllResults();
        $data['total_pemilih'] = $pemilihModel->countAllResults();
        
        return view('admin/dashboard', $data);
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
        
        $userData = [
            'name'     => $this->request->getPost('name'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'role'     => 'kandidat',
        ];
        
        $userId = $userModel->insert($userData);

        if (!$userId) {
            return redirect()->back()->withInput()->with('error', 'Gagal membuat akun untuk kandidat.');
        }

        $kandidatModel = new KandidatModel();
        // Insert ini akan berhasil karena kolom visi/misi sekarang NULLable
        $kandidatModel->insert([
            'user_id' => $userId,
            'foto'    => 'default.png',
        ]);

        return redirect()->to('/admin/dashboard')->with('success', 'Kandidat baru berhasil ditambahkan.');
    }

    public function results()
    {
        $voteModel = new VoteModel();
        
        // Query builder untuk mendapatkan detail vote
        $data['votes'] = $voteModel
            ->select('pemilih.kode_unik, users.name as nama_kandidat, vote.created_at as waktu_memilih')
            ->join('pemilih', 'pemilih.id = vote.pemilih_id')
            ->join('kandidat', 'kandidat.id = vote.kandidat_id')
            ->join('users', 'users.id = kandidat.user_id')
            ->findAll();

        return view('admin/hasil', $data);
    }

    public function generateVoterCodes()
    {
        $pemilihModel = new PemilihModel();
        $jumlahKode = 10;
        $generatedCodes = [];

        for ($i = 0; $i < $jumlahKode; $i++) {
            $kode = random_string('alnum', 8);

            $dataPemilih = [
                'nama'          => 'Pemilih-' . $kode,
                'kode_unik'     => $kode,
                'sudah_memilih' => 0,
            ];

            if ($pemilihModel->insert($dataPemilih)) {
                $generatedCodes[] = $kode;
            }
        }

        $data['codes'] = $generatedCodes;
        $data['total_dibuat'] = count($generatedCodes);

        // Tampilkan halaman baru dengan daftar kode
        return view('admin/generated_codes', $data);
    }
}
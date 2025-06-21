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
        
        // PERBAIKAN: Menyesuaikan nama view dengan struktur file Anda.
        return view('admin/admin_dashboard', $data);
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
        $kandidatModel->insert([
            'user_id' => $userId,
            'foto'    => 'default.png',
        ]);

        return redirect()->to('/admin/admin_dashboard')->with('success', 'Kandidat baru berhasil ditambahkan.');
    }
    public function results()
    {
        $voteModel = new VoteModel();
        
        $data['votes'] = $voteModel
            ->select('pemilih.kode_unik, users.name as nama_kandidat, vote.created_at as waktu_memilih')
            ->join('pemilih', 'pemilih.id = vote.pemilih_id')
            ->join('kandidat', 'kandidat.id = vote.kandidat_id')
            ->join('users', 'users.id = kandidat.user_id')
            ->findAll();

        return view('admin/hasil', $data);
    }
        public function clearResults()
    {
        $voteModel = new VoteModel();
        $pemilihModel = new PemilihModel();
        $db = db_connect();
        $db->transStart();

        $voteModel->emptyTable();

        $pemilihModel->builder()->update(['sudah_memilih' => 0]);

        $db->transComplete();

        if ($db->transStatus() === false) {
            return redirect()->to('admin/results')->with('error', 'Gagal mereset data pemilihan.');
        }

        return redirect()->to('admin/results')->with('success', 'Semua data hasil pemilihan berhasil dihapus dan status pemilih telah direset.');
    }
    public function generateVoterCodes()
    {
        helper('text');
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

        return view('admin/generated_codes', $data);
    }
    public function manageCandidates()
    {
        $userModel = new UserModel();
        $data['candidates'] = $userModel->where('role', 'kandidat')->findAll();

        return view('admin/manage_candidates', $data);
    }

    public function deleteCandidate($userId)
    {
        $userModel = new UserModel();
        $kandidatModel = new KandidatModel();

        $kandidat = $kandidatModel->where('user_id', $userId)->first();

        if ($userModel->delete($userId)) {
            if ($kandidat && $kandidat['foto'] !== 'default.png') {
                $photoPath = FCPATH . 'uploads/photos/' . $kandidat['foto'];
                if (file_exists($photoPath)) {
                    unlink($photoPath);
                }
            }
            return redirect()->to('admin/candidates')->with('success', 'Kandidat berhasil dihapus.');
        }
        return redirect()->to('admin/candidates')->with('error', 'Gagal menghapus. Kandidat ini kemungkinan sudah memiliki suara.');
    }
}

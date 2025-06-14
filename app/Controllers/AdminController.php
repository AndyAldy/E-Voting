<?php

namespace App\Controllers;

use App\Models\CandidateModel;
use App\Models\UniqueCodeModel;
use App\Models\UserModel;

class AdminController extends BaseController
{
    /**
     * Menampilkan dashboard utama admin.
     */
    public function dashboard()
    {
        return view('admin/index');
    }

    /**
     * Menampilkan halaman untuk menambah kandidat baru.
     */
    public function addCandidatePage()
    {
        return view('admin/add_candidates');
    }

    /**
     * Menyimpan data kandidat baru.
     */
    public function saveCandidate()
    {
        // 1. Validasi data form
        $rules = [
            'full_name' => 'required|min_length[3]',
            'email'     => 'required|valid_email|is_unique[users.email]',
            'password'  => 'required|min_length[6]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // 2. Buat akun login untuk kandidat di tabel `users`
        $userModel = new UserModel();
        $userId = $userModel->insert([
            // PERBAIKAN: Menggunakan service('request') untuk keandalan maksimal
            'email'    => service('request')->getPost('email'),
            'password' => service('request')->getPost('password'), // Biarkan UserModel yang melakukan hashing
            'role'     => 'candidate',
        ]);

        // Jika user gagal dibuat, hentikan proses.
        if (!$userId) {
            return redirect()->back()->withInput()->with('error', 'Gagal membuat akun untuk kandidat.');
        }

        // 3. Buat profil di tabel `candidates`
        $candidateModel = new CandidateModel();
        $candidateModel->insert([
            'user_id'   => $userId,
            // PERBAIKAN: Menggunakan service('request') di sini juga
            'full_name' => service('request')->getPost('full_name'),
            'vision'    => '',
            'mission'   => '',
            'photo'     => 'default.png',
        ]);

        return redirect()->to('/admin')->with('success', 'Kandidat baru berhasil ditambahkan.');
    }

    /**
     * Menampilkan hasil pemilihan detail (siapa memilih siapa).
     */
    public function results()
    {
        $db = db_connect();
        $builder = $db->table('votes');
        $builder->select('unique_codes.code as voter_code, candidates.full_name as candidate_name, votes.voted_at');
        $builder->join('candidates', 'candidates.id = votes.candidate_id');
        $builder->join('unique_codes', 'unique_codes.id = votes.voter_code_id');
        $data['votes'] = $builder->get()->getResultArray();

        return view('admin/hasil', $data);
    }

    /**
     * Menghasilkan kode unik untuk para pemilih (voters).
     */
    public function generateVoterCodes()
    {
        helper('text');
        $codeModel = new UniqueCodeModel();
        $jumlahKode = 10;
        $kodeTerbuat = 0;

        for ($i = 0; $i < $jumlahKode; $i++) {
            $kode = random_string('alnum', 8);
            $codeModel->insert(['code' => $kode, 'is_used' => 0]);
            $kodeTerbuat++;
        }

        return redirect()->to('/admin')->with('success', "$kodeTerbuat kode pemilih baru berhasil dibuat.");
    }
}

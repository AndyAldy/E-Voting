<?php

namespace App\Controllers;

use App\Models\CandidateModel;
use App\Models\VoteModel;
use App\Models\UniqueCodeModel;

class Vote extends BaseController
{
    /**
     * Menampilkan halaman yang sesuai:
     * - Jika belum memasukkan kode -> tampilkan form kode unik.
     * - Jika sudah memasukkan kode valid -> tampilkan halaman pemilihan.
     */
    public function index()
    {
        // Cek apakah pemilih sudah dalam sesi voting yang valid
        if (session()->get('is_voter')) {
            $candidateModel = new CandidateModel();
            $data['candidates'] = $candidateModel->findAll();
            return view('vote/voting_page', $data); // Tampilkan halaman untuk memilih
        }

        // Jika tidak ada sesi, tampilkan halaman untuk memasukkan kode
        return view('vote/enter_code_page');
    }

    /**
     * Memproses kode unik yang dimasukkan pemilih.
     */
    public function processCode()
    {
        $uniqueCode = $this->request->getPost('unique_code');

        $codeModel = new UniqueCodeModel();
        $codeData = $codeModel->where('code', $uniqueCode)->where('is_used', 0)->first();

        if ($codeData) {
            // Jika kode valid, buat sesi untuk pemilih
            session()->set([
                'voter_code_id' => $codeData['id'],
                'voter_code'    => $codeData['code'],
                'is_voter'      => true,
            ]);
            // Arahkan kembali ke halaman utama, yang sekarang akan menampilkan halaman vote
            return redirect()->to('/');
        }

        return redirect()->back()->with('error', 'Kode unik tidak valid atau sudah digunakan.');
    }

    /**
     * Menyimpan suara yang dipilih.
     */
    public function submitVote()
    {
        // Pastikan hanya pemilih dalam sesi yang bisa submit
        if (!session()->get('is_voter')) {
            return redirect()->to('/');
        }

        $voterCodeId = session()->get('voter_code_id');
        $candidateId = $this->request->getPost('candidate_id');

        if (empty($candidateId)) {
            return redirect()->back()->with('error', 'Anda harus memilih salah satu kandidat.');
        }

        // Simpan ke database
        $voteModel = new VoteModel();
        $voteModel->insert([
            'voter_code_id' => $voterCodeId,
            'candidate_id'  => $candidateId,
            'voted_at'      => date('Y-m-d H:i:s')
        ]);

        // Tandai kode sebagai sudah digunakan
        $codeModel = new UniqueCodeModel();
        $codeModel->update($voterCodeId, ['is_used' => 1]);

        // Hancurkan sesi dan tampilkan pesan terima kasih
        session()->destroy();
        return view('vote/thank_you_page');
    }
}
<?php

namespace App\Controllers;

use App\Models\KandidatModel;
use App\Models\PemilihModel;
use App\Models\VoteModel;

class VoteController extends BaseController
{
    public function index()
    {
        if (session()->get('is_pemilih')) {
            $kandidatModel = new KandidatModel();
            
            $data['candidates'] = $kandidatModel
                ->select('kandidat.id, kandidat.visi, kandidat.misi, users.name as nama_kandidat, kandidat.foto')
                ->join('users', 'users.id = kandidat.user_id')
                ->findAll();

            return view('vote/voting_page', $data);
        }
        
        return view('vote/enter_code_page');
    }

    public function processCode()
    {
        $pemilihModel = new PemilihModel();
        // PERBAIKAN: Sesuaikan dengan 'name' di view
        $kodeInput = $this->request->getPost('kode_unik');

        $dataPemilih = $pemilihModel
                        ->where('kode_unik', $kodeInput)
                        ->where('sudah_memilih', 0)
                        ->first();

        if ($dataPemilih) {
            session()->set([
                'pemilih_id'   => $dataPemilih['id'],
                'nama_pemilih' => $dataPemilih['nama'],
                'is_pemilih'   => true,
            ]);
            return redirect()->to('/');
        }

        return redirect()->back()->with('error', 'Kode unik tidak valid atau sudah digunakan.');
    }

    public function submitVote()
    {
        if (!session()->get('is_pemilih')) {
            return redirect()->to('/');
        }

        $kandidatId = $this->request->getPost('kandidat_id');
        // Validasi, pastikan pemilih memilih salah satu kandidat
        if (empty($kandidatId)) {
            return redirect()->back()->with('error', 'Anda harus memilih salah satu kandidat.');
        }
        
        // PERBAIKAN: Gunakan VoteModel yang benar
        $voteModel = new VoteModel();
        $pemilihModel = new PemilihModel();
        $pemilihId = session()->get('pemilih_id');

        // Gunakan transaksi untuk memastikan kedua operasi berhasil
        $db = db_connect();
        $db->transStart();

        // 1. Simpan suara ke tabel 'vote'
        $voteModel->insert([
            'pemilih_id'  => $pemilihId,
            'kandidat_id' => $kandidatId,
        ]);

        // 2. Update status pemilih
        $pemilihModel->update($pemilihId, ['sudah_memilih' => 1]);
        
        $db->transComplete();

        if ($db->transStatus() === false) {
            // Jika transaksi gagal, kembalikan dengan error
            return redirect()->back()->with('error', 'Terjadi kesalahan teknis, silakan coba lagi.');
        }

        session()->destroy();
        
        return redirect()->to('vote/thank-you');
    }

    public function thankYouPage()
    {
        return view('vote/thank_you_page');
    }
}

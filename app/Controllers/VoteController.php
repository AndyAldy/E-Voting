<?php

namespace App\Controllers;

use App\Models\KandidatModel;
use App\Models\PemilihModel;
use App\Models\VoteModel;

class VoteController extends BaseController
{
    public function index()
    {
        // Gunakan pengecekan sesi yang aman untuk pemilih
        if (session()->has('voter_user') && session()->get('voter_user.is_pemilih')) {
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
        $kodeInput = $this->request->getPost('kode_unik');

        $dataPemilih = $pemilihModel
                        ->where('kode_unik', $kodeInput)
                        ->where('sudah_memilih', 0)
                        ->first();

        if ($dataPemilih) {
            // Simpan sesi pemilih dalam grup 'voter_user' agar tidak tabrakan
            $voter_data = [
                'pemilih_id'   => $dataPemilih['id'],
                'nama_pemilih' => $dataPemilih['nama'],
                'is_pemilih'   => true,
            ];
            session()->set('voter_user', $voter_data);
            
            return redirect()->to('/');
        }

        return redirect()->back()->with('error', 'Kode unik tidak valid atau sudah digunakan.');
    }

    public function submitVote()
    {
        // Gunakan pengecekan sesi yang aman
        if (!session()->has('voter_user') || !session()->get('voter_user.is_pemilih')) {
            return redirect()->to('/');
        }

        $kandidatId = $this->request->getPost('kandidat_id');
        if (empty($kandidatId)) {
            return redirect()->back()->with('error', 'Anda harus memilih salah satu kandidat.');
        }
        
        $voteModel = new VoteModel();
        $pemilihModel = new PemilihModel();
        // Ambil ID pemilih dari sesi yang sudah dikelompokkan
        $pemilihId = session()->get('voter_user.pemilih_id');

        // Pastikan pemilihId tidak kosong sebelum melanjutkan
        if (empty($pemilihId)) {
            return redirect()->to('/')->with('error', 'Sesi Anda tidak valid. Silakan masukkan kode lagi.');
        }

        $db = db_connect();
        $db->transStart();

        $voteModel->insert([
            'pemilih_id'  => $pemilihId,
            'kandidat_id' => $kandidatId,
        ]);

        // Sekarang $pemilihId pasti berisi ID yang benar
        $pemilihModel->update($pemilihId, ['sudah_memilih' => 1]);
        
        $db->transComplete();

        if ($db->transStatus() === false) {
            return redirect()->back()->with('error', 'Terjadi kesalahan teknis, silakan coba lagi.');
        }

        // Hapus sesi pemilih saja, agar tidak mengganggu sesi admin jika ada
        session()->remove('voter_user');
        
        return redirect()->to('vote/thank-you');
    }

    public function thankYouPage()
    {
        return view('vote/thank_you_page');
    }
    
    public function logout()
    {
        // Hapus semua sesi yang mungkin ada dan kembali ke halaman utama
        session()->destroy();
        return redirect()->to('/');
    }
}
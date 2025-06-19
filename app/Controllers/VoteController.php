<?php
namespace App\Controllers;

// PENYESUAIAN: Menggunakan model yang benar
use App\Models\KandidatModel;
use App\Models\PemilihModel;
use App\Models\VoteModel;
use App\Models\UserModel; // Diperlukan untuk join data kandidat

class VoteController extends BaseController
{
    /**
     * Menampilkan halaman utama vote.
     * Jika pemilih sudah login (memasukkan kode), tampilkan halaman pilihan kandidat.
     * Jika belum, tampilkan halaman untuk memasukkan kode unik.
     */
    public function index()
    {
        // 'is_pemilih' adalah flag session yang kita gunakan untuk menandai pemilih yang valid
        if (session()->get('is_pemilih')) {
            $kandidatModel = new KandidatModel();
            
            // Mengambil data kandidat beserta data dari tabel 'users' (untuk nama dan foto)
            $data['kandidat_list'] = $kandidatModel
                ->join('users', 'users.id = kandidat.user_id')
                ->select('kandidat.id, kandidat.visi, kandidat.misi, users.name as nama_kandidat, kandidat.foto')
                ->findAll();

            return view('vote/halaman_voting', $data);
        }
        
        // Default, tampilkan halaman untuk memasukkan kode
        return view('vote/enter_code_page');
    }

    /**
     * Memproses kode unik yang dimasukkan oleh pemilih.
     */
    public function prosesKode()
    {
        // PENYESUAIAN: Menggunakan PemilihModel
        $pemilihModel = new PemilihModel();
        $kodeInput = service('request')->getPost('kode_unik');

        // PENYESUAIAN: Mencari berdasarkan 'kode_unik' dan 'sudah_memilih' = 0
        $dataPemilih = $pemilihModel->where('kode_unik', $kodeInput)
                                    ->where('sudah_memilih', 0)
                                    ->first();

        // Jika data pemilih ditemukan dan valid
        if ($dataPemilih) {
            // PENYESUAIAN: Simpan 'pemilih_id' dan nama pemilih ke session
            session()->set([
                'pemilih_id'   => $dataPemilih['id'],
                'nama_pemilih' => $dataPemilih['nama'],
                'is_pemilih'   => true, // Flag penanda login berhasil
            ]);
            // Redirect ke halaman utama, yang sekarang akan menampilkan halaman voting
            return redirect()->to('/'); 
        }

        // Jika kode salah atau sudah digunakan
        return redirect()->back()->with('error', 'Kode unik tidak valid atau sudah digunakan.');
    }

    /**
     * Menerima dan menyimpan suara dari pemilih.
     */
    public function kirimSuara()
    {
        // Pastikan hanya pemilih yang sudah login yang bisa mengirim suara
        if (!session()->get('is_pemilih')) {
            return redirect()->to('/');
        }

        $voteModel = new PemilihModel();
        $pemilihModel = new PemilihModel();
        $pemilihId = session()->get('pemilih_id');
        $kandidatId = service('request')->getPost('kandidat_id');

        // 1. Simpan suara ke tabel 'vote'
        // PENYESUAIAN: Menggunakan 'pemilih_id'
        $voteModel->insert([
            'pemilih_id'  => $pemilihId,
            'kandidat_id' => $kandidatId,
        ]);

        // 2. Update status pemilih menjadi sudah memilih
        // PENYESUAIAN: Update berdasarkan 'pemilih_id' dan mengubah kolom 'sudah_memilih'
        $pemilihModel->update($pemilihId, ['sudah_memilih' => 1]);

        // 3. Hancurkan session agar tidak bisa vote dua kali dan kembali ke halaman awal
        session()->destroy();
        
        // Tampilkan halaman terima kasih
        return view('vote/thank_you_page');
    }

    /**
     * Fungsi untuk logout manual jika pemilih tidak jadi memilih.
     */
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
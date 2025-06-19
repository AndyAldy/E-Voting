<?php

namespace App\Controllers;

use App\Models\KandidatModel; // Pastikan ini menggunakan KandidatModel, bukan CandidateModel

class KandidatController extends BaseController
{
    public function dashboard()
    {
        $kandidatModel = new KandidatModel();
        // Mengambil data kandidat berdasarkan user_id dari session
        $data['kandidat'] = $kandidatModel->where('user_id', session()->get('user_id'))->first();
        return view('kandidat/dashboard', $data); // Mengirim data dengan key 'kandidat'
    }

    public function updateProfile()
    {
        $kandidatModel = new KandidatModel();
        $dataKandidat = $kandidatModel->where('user_id', session()->get('user_id'))->first();

        // Jika tidak ada data kandidat untuk user ini, redirect
        if (!$dataKandidat) {
            return redirect()->to('/logout')->with('error', 'Data kandidat tidak ditemukan.');
        }

        $fileFoto = service('request')->getFile('foto'); // Ambil file dengan name 'foto' dari form

        // PENYESUAIAN: Gunakan kolom 'foto' dari database sebagai nama default
        $namaFoto = $dataKandidat['foto'];

        // Periksa apakah ada file foto baru yang diunggah
        if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
            // Hapus foto lama jika bukan foto default
            if ($namaFoto != 'default.png' && file_exists(ROOTPATH . 'public/uploads/photos/' . $namaFoto)) {
                unlink(ROOTPATH . 'public/uploads/photos/' . $namaFoto);
            }
            
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move(ROOTPATH . 'public/uploads/photos', $namaFoto);
        }

        // PENYESUAIAN: Sesuaikan semua key array dengan nama kolom di tabel 'kandidat'
        $updateData = [
            'visi'    => service('request')->getPost('visi'),
            'misi'    => service('request')->getPost('misi'),
            'foto'    => $namaFoto,
        ];

        $kandidatModel->update($dataKandidat['id'], $updateData);

        return redirect()->to('/kandidat/dashboard')->with('success', 'Profil berhasil diperbarui.');
    }
}
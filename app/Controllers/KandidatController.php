<?php

namespace App\Controllers;

use App\Models\KandidatModel;

class KandidatController extends BaseController
{
    public function dashboard()
    {
        $kandidatModel = new KandidatModel();
        $userId = session()->get('user_id');

        // PERBAIKAN: Melakukan JOIN untuk mengambil nama dari tabel 'users'
        $data['kandidat'] = $kandidatModel
            ->select('kandidat.*, users.name as nama_kandidat')
            ->join('users', 'users.id = kandidat.user_id')
            ->where('kandidat.user_id', $userId)
            ->first();

        if (!$data['kandidat']) {
            return redirect()->to('/logout')->with('error', 'Data kandidat tidak ditemukan.');
        }

        return view('candidate/candidate_dashboard', $data);
    }

    public function updateProfile()
    {
        $kandidatModel = new KandidatModel();
        $userId = session()->get('user_id');
        $dataKandidat = $kandidatModel->where('user_id', $userId)->first();

        if (!$dataKandidat) {
            return redirect()->to('/logout')->with('error', 'Data kandidat tidak ditemukan.');
        }

        $fileFoto = $this->request->getFile('foto');
        $namaFoto = $dataKandidat['foto'];

        if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
            // Hapus foto lama jika bukan default.png
            if ($namaFoto !== 'default.png' && file_exists(FCPATH . 'uploads/photos/' . $namaFoto)) {
                unlink(FCPATH . 'uploads/photos/' . $namaFoto);
            }
            
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move(FCPATH . 'uploads/photos', $namaFoto);
        }

        // PERBAIKAN: Sesuaikan nama field dengan yang ada di database
        $updateData = [
            'visi' => $this->request->getPost('visi'),
            'misi' => $this->request->getPost('misi'),
            'foto' => $namaFoto,
        ];

        $kandidatModel->update($dataKandidat['id'], $updateData);

        return redirect()->to('/candidate/candidate_dashboard')->with('success', 'Profil berhasil diperbarui.');
    }
}
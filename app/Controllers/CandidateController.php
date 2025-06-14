<?php
namespace App\Controllers;

use App\Models\CandidateModel;

class CandidateController extends BaseController
{
    public function dashboard()
    {
        $candidateModel = new CandidateModel();
        $data['candidate'] = $candidateModel->where('user_id', session()->get('user_id'))->first();
        return view('candidate/dashboard', $data);
    }

    public function updateProfile()
    {
        $candidateModel = new CandidateModel();
        $candidateData = $candidateModel->where('user_id', session()->get('user_id'))->first();

        // PERBAIKAN: Menggunakan service('request') untuk mengambil file
        $photoFile = service('request')->getFile('photo');
        $photoName = $candidateData['photo']; // Gunakan foto lama sebagai default

        // Periksa apakah file valid dan belum dipindahkan
        if ($photoFile && $photoFile->isValid() && !$photoFile->hasMoved()) {
            $photoName = $photoFile->getRandomName();
            $photoFile->move(ROOTPATH . 'public/uploads/photos', $photoName);
        }

        $candidateModel->update($candidateData['id'], [
            // PERBAIKAN: Menggunakan service('request') untuk mengambil data post
            'vision'  => service('request')->getPost('vision'),
            'mission' => service('request')->getPost('mission'),
            'photo'   => $photoName,
        ]);

        return redirect()->to('/candidate/dashboard')->with('success', 'Profil berhasil diperbarui.');
    }
}

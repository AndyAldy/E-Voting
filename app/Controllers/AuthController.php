<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    /**
     * Menampilkan halaman login untuk Admin dan Kandidat.
     */
    public function loginPage()
    {
        return view('auth/management_login');
    }

    /**
     * Memproses data login dari form.
     */
    public function processLogin()
    {
        // 1. Ambil input dari form
        $userModel = new UserModel();
        $username = service('request')->getPost('username');
        $password = service('request')->getPost('password');

        // 2. Cari user di database berdasarkan username
        $user = $userModel->where('username', $username)->first();

        // 3. Verifikasi: Cek apakah user ada DAN password yang diinput cocok dengan hash di database
        if ($user && password_verify($password, $user['password'])) {
            
            // 4. Jika berhasil, buat data session
            session()->set([
                'user_id'   => $user['id'],
                'role'      => $user['role'],
                'logged_in' => true,
            ]);

            // 5. Arahkan (redirect) pengguna berdasarkan perannya (role)
            if ($user['role'] === 'admin') {
                return redirect()->to('/admin/dashboard');
            } elseif ($user['role'] === 'kandidat') {
                return redirect()->to('/kandidat/dashboard');
            }
        }

        // 6. Jika verifikasi gagal, kembalikan ke halaman login dengan pesan error
        return redirect()->back()->withInput()->with('error', 'Username atau password salah.');
    }

    /**
     * Menghapus session dan melakukan logout.
     */
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
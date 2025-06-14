<?php
namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    // Menampilkan halaman login terpadu di /manage
    public function loginPage()
    {
        return view('auth/management_login');
    }

    // Memproses login dari form terpadu
    public function processLogin()
    {
        $userModel = new UserModel();
        $user = $userModel->where('username', service('request')->getPost('username'))->first();

        if ($user && password_verify(service('request')->getPost('password'), $user['password'])) {
            session()->set([
                'user_id'   => $user['id'],
                'role'      => $user['role'],
                'logged_in' => true,
            ]);

            // Cek peran (role) untuk menentukan redirect
            if ($user['role'] === 'admin') {
                return redirect()->to('/admin');
            } elseif ($user['role'] === 'candidate') {
                return redirect()->to('/candidate/dashboard');
            }
        }

        // Jika login gagal atau peran tidak dikenali
        return redirect()->back()->withInput()->with('error', 'username atau password salah.');
    }

    // Logout dan kembali ke halaman utama
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}

<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    // Menampilkan halaman login khusus di /manage
    public function loginPage()
    {
        return view('auth/management_login');
    }

    // Memproses login dari halaman /manage
    public function processLogin()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'user_id'   => $user['id'],
                'username'  => $user['username'],
                'role'      => $user['role'],
                'logged_in' => true,
            ]);

            if ($user['role'] === 'admin') {
                return redirect()->to('/admin');
            } elseif ($user['role'] === 'candidate') {
                return redirect()->to('/candidate/dashboard');
            }
        }

        return redirect()->back()->with('error', 'Email atau password salah.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/manage');
    }
}
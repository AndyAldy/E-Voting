<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function loginPage()
    {
        return view('auth/management_login');
    }

    public function processLogin()
    {
        $userModel = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'user_id'   => $user['id'],
                'role'      => $user['role'],
                'logged_in' => true,
            ]);

            if ($user['role'] === 'admin') {
                return redirect()->to('/admin/dashboard');
            } elseif ($user['role'] === 'kandidat') {
                // PERBAIKAN: Mengarahkan ke rute kandidat yang benar
                return redirect()->to('/candidate/dashboard');
            }
        }

        return redirect()->back()->withInput()->with('error', 'Username atau password salah.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/manage')->with('success', 'Anda telah berhasil logout.');
    }
}
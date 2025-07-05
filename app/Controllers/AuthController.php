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
            $management_data = [
                'user_id'   => $user['id'],
                'role'      => $user['role'],
                'logged_in' => true,
            ];
        session()->set('management_user', $management_data);

            if ($user['role'] === 'admin') {
                return redirect()->to('/admin/admin_dashboard');
            } elseif ($user['role'] === 'kandidat') {
                return redirect()->to('/candidate/candidate_dashboard');
            }
        }

        return redirect()->back()->withInput()->with('error', 'Username atau password salah.');
    }

public function logout()
{
    session()->remove('management_user');
    return redirect()->to('/manage')->with('success', 'Anda telah berhasil logout.');
}
}
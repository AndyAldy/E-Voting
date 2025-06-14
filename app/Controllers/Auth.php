<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

public function loginPost()
{
    $session = session();
    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');

    $userModel = new \App\Models\UserModel(); // Pastikan UserModel ada
    $user = $userModel->where('email', $email)->first();

    if ($user && password_verify($password, $user['password'])) {
        // Set session setelah berhasil login
        $session->set([
            'user_id'   => $user['id'],
            'role'      => $user['role'], // pastikan kolom 'role' ada
            'logged_in' => true,
        ]);

        // Redirect ke halaman sesuai role
        if ($user['role'] === 'admin') {
            return redirect()->to('/admin');
        } else {
            return redirect()->to('/dashboard');
        }
    }

    // Jika login gagal
    return redirect()->back()->with('error', 'Email atau password salah.');
}


    public function register()
    {
        return view('auth/register');
    }

    public function registerPost()
    {
        $model = new UserModel();
        $model->insert([
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role' => 'user'
        ]);
        return redirect()->to('/login');
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/login');
    }
}

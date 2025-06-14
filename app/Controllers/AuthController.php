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
        // PERBAIKAN: Gunakan service('request') untuk mengambil email
        $user = $userModel->where('email', service('request')->getPost('email'))->first();

        // PERBAIKAN: Gunakan service('request') untuk mengambil password
        if ($user && password_verify(service('request')->getPost('password'), $user['password'])) {
            session()->set([
                'user_id'   => $user['id'],
                'role'      => $user['role'],
                'logged_in' => true,
            ]);

            if ($user['role'] === 'admin') return redirect()->to('/admin');
            if ($user['role'] === 'candidate') return redirect()->to('/candidate/dashboard');
        }
        return redirect()->back()->with('error', 'Email atau password salah.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/manage');
    }
}

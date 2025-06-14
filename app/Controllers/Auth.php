<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
public function kodeLogin()
{
    return view('auth/code_login');
}

public function kodeLoginPost()
{
    $kode = $this->request->getPost('kode');
    $userModel = new \App\Models\UserModel();
    $user = $userModel->where('unique_code', $kode)->first();

    if ($user) {
        session()->set([
            'user_id'   => $user['id'],
            'role'      => $user['role'],
            'logged_in' => true,
        ]);
        return redirect()->to('/dashboard');
    }

    return redirect()->back()->with('error', 'Kode unik tidak valid.');
}
}
<?php

namespace App\Controllers;

class Home extends BaseController
{
    /**
     * Redirect ke halaman login secara default
     */
    public function index()
    {
        return redirect()->to('/login');
    }
}

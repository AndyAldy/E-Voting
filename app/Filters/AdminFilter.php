<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminFilter implements FilterInterface
{
// Di dalam AdminFilter.php
public function before(RequestInterface $request, $arguments = null)
{
    $session = session();
    if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
        return redirect()->to('/manage')->with('error', 'Anda harus login sebagai admin.');
    }
}

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak perlu ada kode di sini
    }
}
<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // Pastikan user sudah login dan memiliki role admin
        if (! $session->get('logged_in') || $session->get('role') !== 'admin') {
            
            // Diarahkan ke halaman login khusus admin/kandidat, bukan halaman lama
            return redirect()->to('/manage')->with('error', 'Anda harus login sebagai admin untuk mengakses halaman ini.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak perlu ada kode di sini
    }
}
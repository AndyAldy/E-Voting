<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Cek apakah session 'logged_in' tidak ada ATAU session 'role' bukan 'admin'
        if (!session()->get('logged_in') || session()->get('role') !== 'admin') {
            // Jika tidak memenuhi syarat, tendang kembali ke halaman login manage
            return redirect()->to('/manage')->with('error', 'Anda harus login sebagai admin untuk mengakses halaman ini.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak perlu melakukan apa-apa setelah controller
    }
}
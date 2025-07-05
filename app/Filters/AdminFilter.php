<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // Cek jika sesi management_user tidak ada, atau jika rolenya bukan 'admin'
        if (!$session->has('management_user') || $session->get('management_user.role') !== 'admin') {
            // Usir kembali ke halaman login dengan pesan yang benar
            return redirect()->to('/manage')->with('error', 'Anda harus login sebagai Admin untuk mengakses halaman ini.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
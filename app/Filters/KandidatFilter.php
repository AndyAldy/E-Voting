<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class KandidatFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        
        // Cek jika sesi management_user tidak ada, atau jika rolenya bukan 'kandidat'
        if (!$session->has('management_user') || $session->get('management_user.role') !== 'kandidat') {
            return redirect()->to('/manage')->with('error', 'Anda harus login sebagai Kandidat untuk mengakses halaman ini.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak perlu melakukan apa-apa
    }
}
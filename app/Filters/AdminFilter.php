<?php
namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {

if (session()->get('management_user.role') !== 'kandidat') { // Ambil dari grup
    return redirect()->to('/manage')->with('error', 'Anda harus login sebagai kandidat untuk mengakses halaman ini.');
}
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing
    }
}
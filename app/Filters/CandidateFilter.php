<?php
namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class CandidateFilter implements FilterInterface
{
// Di dalam CandidateFilter.php
public function before(RequestInterface $request, $arguments = null)
{
    $session = session();
    if (!$session->get('logged_in') || $session->get('role') !== 'candidate') {
        return redirect()->to('/manage')->with('error', 'Anda harus login sebagai kandidat.');
    }
}

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {}
}
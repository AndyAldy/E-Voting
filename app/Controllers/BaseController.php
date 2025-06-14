<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class BaseController extends Controller
{
    protected $request;
    protected $session;

    /**
     * Helpers yang ingin dipanggil otomatis di seluruh controller
     */
    protected $helpers = ['url', 'form'];

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // WAJIB dipanggil agar CI4 bekerja dengan benar
        parent::initController($request, $response, $logger);

        // Mulai session
        $this->session = \Config\Services::session();
    }

    /**
     * Cek apakah user sudah login, dipakai untuk controller umum
     */
    protected function isLoggedIn()
    {
        return $this->session->has('user_id');
    }

    /**
     * Cek apakah user adalah admin
     */
    protected function isAdmin()
    {
        return $this->session->get('role') === 'admin';
    }

    /**
     * Redirect ke login jika belum login
     */
    protected function redirectIfNotLoggedIn()
    {
        if (!$this->isLoggedIn()) {
            return redirect()->to('/login');
        }
    }

    /**
     * Redirect ke dashboard jika bukan admin
     */
    protected function redirectIfNotAdmin()
    {
        if (!$this->isAdmin()) {
            return redirect()->to('/dashboard');
        }
    }
}

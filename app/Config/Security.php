<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Security extends BaseConfig
{
    /**
     * --------------------------------------------------------------------------
     * CSRF Protection Method
     * --------------------------------------------------------------------------
     *
     * @var bool
     */
    public bool $csrfProtection = true; // PASTIKAN INI BERNILAI TRUE

    public bool $tokenRandomize = true;
    public string $tokenName = 'csrf_test_name'; // Biarkan default
    public string $headerName = 'X-CSRF-TOKEN';
    public string $cookieName = 'csrf_cookie_name'; // Biarkan default
    public int $expires = 7200;
    public bool $regenerate = true; // Biarkan true untuk keamanan
    public bool $redirect = false;
    public string $samesite = 'Lax';
}
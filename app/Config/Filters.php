<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    public array $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'admin'         => \App\Filters\AdminFilter::class,
        'kandidat'      => \App\Filters\KandidatFilter::class,
    ];

    public array $globals = [
        'before' => [
            // 'honeypot',
            'csrf',
        ],
        'after' => [
            'toolbar',
            // 'honeypot',
            // 'secureheaders',
        ],
    ];

    public array $methods = [];
   public array $filters = [
    'admin' => ['before' => ['admin', 'admin/*']],
    'kandidat' => ['before' => ['candidate', 'candidate/*']],
];
}
<?php

namespace Config;

use CodeIgniter\Config\Filters as BaseFilters;
use CodeIgniter\Filters\Cors;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseFilters
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     */
public array $aliases = [
    'csrf'     => CSRF::class,
    'toolbar'  => DebugToolbar::class,
    'honeypot' => Honeypot::class,
    'invalidchars' => InvalidChars::class,
    'secureheaders' => SecureHeaders::class,
    'admin'    => \App\Filters\AdminFilter::class,
    'kandidat' => \App\Filters\KandidatFilter::class,
];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     */
    public array $globals = [
        'before' => [
            // 'honeypot',
            'csrf', // Sebaiknya aktifkan CSRF untuk keamanan form
            // 'invalidchars',
        ],
        'after' => [
            'toolbar',
            // 'honeypot',
            // 'secureheaders',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     */
    public array $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     */
    public array $filters = [];

    /**
     * The $required property is deprecated but we declare it here
     * as an empty array to prevent legacy framework defaults from loading.
     * INI ADALAH PERBAIKAN FINAL.
     */
    public array $required = [];
}

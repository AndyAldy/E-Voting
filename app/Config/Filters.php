<?php
namespace Config;

use CodeIgniter\Config\Filters as BaseFilters;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;

class Filters extends BaseFilters
{
    public array $aliases = [
        'csrf'      => CSRF::class,
        'toolbar'   => DebugToolbar::class,
        'honeypot'  => Honeypot::class,
        'admin'     => \App\Filters\AdminFilter::class,
        'candidate' => \App\Filters\CandidateFilter::class,
    ];

    public array $globals = [
        'before' => ['csrf'], // Aktifkan CSRF untuk keamanan form
        'after'  => ['toolbar'],
    ];

    public array $methods = [];
    public array $filters = [];
}
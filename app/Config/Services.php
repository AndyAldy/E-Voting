<?php

namespace Config;

use CodeIgniter\Config\BaseService;
use Config\Session as SessionConfig;
use CodeIgniter\Session\Session;

class Services extends BaseService
{
    public static function session(bool $getShared = true): Session
    {
        if ($getShared) {
            return static::getSharedInstance('session');
        }

        $config = config(SessionConfig::class);

        return \CodeIgniter\Config\Services::session($config, false);
    }
}

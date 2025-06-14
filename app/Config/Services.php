<?php

namespace Config;

use CodeIgniter\Config\BaseService;

class Services extends BaseService
{
    public static function session($getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('session');
        }

        // FIX: Gunakan parent::session agar tidak infinite loop
        return parent::session($getShared);
    }
}


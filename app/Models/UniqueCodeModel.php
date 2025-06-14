<?php

namespace App\Models;

use CodeIgniter\Model;

class UniqueCodeModel extends Model
{
    protected $table            = 'unique_codes'; // sesuaikan dengan nama tabel kode unik Anda
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['code', 'is_used'];
}
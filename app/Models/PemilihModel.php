<?php

namespace App\Models;

use CodeIgniter\Model;

class PemilihModel extends Model
{
    protected $table            = 'pemilih';
    protected $primaryKey       = 'id';


    protected $useTimestamps    = false;

    protected $createdField     = 'dibuat_pada';
    protected $updatedField     = null;

    protected $allowedFields    = ['nama', 'kode_unik', 'sudah_memilih'];
    protected $returnType       = 'array';
}

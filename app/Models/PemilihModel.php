<?php

namespace App\Models;

use CodeIgniter\Model;

class PemilihModel extends Model
{
    // PENYESUAIAN: Arahkan ke tabel 'pemilih'
    protected $table            = 'pemilih';
    protected $primaryKey       = 'id';
    protected $useTimestamps    = true; // Aktif karena ada 'dibuat pada'

    // PENYESUAIAN: Sesuaikan nama kolom timestamp
    protected $createdField     = 'dibuat pada';
    protected $updatedField     = null; // Tidak ada kolom update di tabel pemilih

    // PENYESUAIAN: Sesuaikan dengan kolom di tabel 'pemilih'
    protected $allowedFields    = ['nama', 'kode_unik', 'sudah_memilih'];

    protected $returnType       = 'array';
}
<?php

namespace App\Models;

use CodeIgniter\Model;

class PemilihModel extends Model
{
    protected $table            = 'pemilih';
    protected $primaryKey       = 'id';
    protected $useTimestamps    = true; // Benar, karena ada kolom timestamp

    // PERBAIKAN KRITIS: Gunakan nama kolom DENGAN UNDERSCORE
    // agar cocok dengan database yang sudah diperbaiki.
    protected $createdField     = 'dibuat_pada';

    // Tidak ada kolom updated_at, jadi ini sudah benar.
    protected $updatedField     = null;

    protected $allowedFields    = ['nama', 'kode_unik', 'sudah_memilih'];
    protected $returnType       = 'array';
}

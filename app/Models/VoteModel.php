<?php

namespace App\Models;

use CodeIgniter\Model;

class VoteModel extends Model
{
    protected $table            = 'vote';
    protected $primaryKey       = 'id';
    protected $useTimestamps    = true; // Menggunakan kolom 'created_at' bawaan CI
    protected $createdField     = 'created_at';
    protected $updatedField     = null; // Tidak ada kolom update

    protected $allowedFields    = ['pemilih_id', 'kandidat_id'];
    protected $returnType       = 'array';
}
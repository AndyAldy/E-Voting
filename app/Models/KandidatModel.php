<?php
namespace App\Models;

use CodeIgniter\Model;

class KandidatModel extends Model
{
    // PENYESUAIAN: Arahkan ke tabel 'kandidat'
    protected $table            = 'kandidat';
    protected $primaryKey       = 'id';
    
    // PENYESUAIAN: Sesuaikan dengan kolom yang ada di tabel 'kandidat'
    // 'full_name' tidak ada di tabel ini, nama ada di tabel 'users'
    protected $allowedFields    = ['user_id', 'visi', 'misi', 'foto'];
    protected $useTimestamps    = false;
    protected $createdField     = ''; // Dikosongkan
    protected $updatedField     = ''; // Dikosongkan

    protected $returnType       = 'array';
}
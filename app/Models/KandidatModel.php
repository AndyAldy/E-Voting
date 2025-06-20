<?php

namespace App\Models;

use CodeIgniter\Model;

class KandidatModel extends Model
{
    protected $table            = 'kandidat';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['user_id', 'visi', 'misi', 'foto'];
    protected $useTimestamps    = false;
    protected $returnType       = 'array';
}
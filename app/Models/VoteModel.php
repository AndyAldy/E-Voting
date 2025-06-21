<?php namespace App\Models;

use CodeIgniter\Model;

class VoteModel extends Model
{
    protected $table            = 'vote';
    protected $primaryKey       = 'id';
    protected $updatedField     = null;
    protected $allowedFields    = ['pemilih_id', 'kandidat_id'];
    protected $returnType       = 'array';
    
}
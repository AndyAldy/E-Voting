<?php
namespace App\Models;

use CodeIgniter\Model;

class VoteModel extends Model
{
    protected $table            = 'votes';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['user_id', 'candidate_id'];
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    protected $returnType       = 'array';
}

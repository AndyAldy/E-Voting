<?php
namespace App\Models;

use CodeIgniter\Model;

class VoteModel extends Model
{
    protected $table = 'votes';
    protected $allowedFields = ['user_id', 'candidate_id'];
    protected $useTimestamps = true;
}

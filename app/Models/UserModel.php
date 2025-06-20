<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useTimestamps    = true; // Aktifkan karena ada kolom 'dibuat_pada'
    protected $createdField     = 'dibuat_pada';
    protected $updatedField     = null; // Tidak ada kolom update

    protected $returnType       = 'array';
    protected $allowedFields    = ['name', 'username', 'password', 'role'];

    protected $beforeInsert     = ['hashPassword'];
    protected $beforeUpdate     = ['hashPassword'];

    protected function hashPassword(array $data)
    {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }
        return $data;
    }
}
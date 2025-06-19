<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useTimestamps    = true; // Tetap true karena ada kolom 'dibuat pada'

    // PENYESUAIAN: Sesuaikan nama kolom created_at dengan yang ada di database
    protected $createdField     = 'dibuat pada'; 
    
    // PENYESUAIAN: Nonaktifkan updated_at karena tidak ada di tabel Anda
    protected $updatedField     = null; 

    protected $returnType       = 'array';

    // PENYESUAIAN: Ganti 'email' dengan 'name' dan 'username'
    protected $allowedFields    = ['name', 'username', 'password', 'role'];

    // Callback untuk hashing password otomatis sudah benar
    protected $beforeInsert     = ['hashPassword'];
    protected $beforeUpdate     = ['hashPassword'];

    protected function hashPassword(array $data)
    {
        if (!empty($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }
        return $data;
    }
}
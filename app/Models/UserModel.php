<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = false;
    protected $allowedFields = ['id', 'name', 'email', 'password', 'created_at', 'updated_at'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function generateUserId()
    {
        do {
            $id = 'user-' . substr(str_shuffle(bin2hex(random_bytes(8))), 0, 16);
        } while ($this->where('id', $id)->countAllResults() > 0);

        return $id;
    }

    public function createUser($data)
    {
        $data['id'] = $this->generateUserId();
        return $this->insert($data);
    }

}

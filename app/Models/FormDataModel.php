<?php

namespace App\Models;

use CodeIgniter\Model;

class FormDataModel extends Model
{
    protected $table      = 'form_datas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'name', 'email', 'service', 'message', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function generateUniqueId()
    {
        do {
            $id = 'anonymous-' . bin2hex(random_bytes(8)); // 16 karakter random
        } while ($this->where('id', $id)->countAllResults() > 0);

        return $id;
    }

    public function insertWithId($data)
    {
        $data['id'] = $this->generateUniqueId();
        return $this->insert($data);
    }
}

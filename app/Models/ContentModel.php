<?php

namespace App\Models;

use CodeIgniter\Model;

class ContentModel extends Model
{
    protected $table      = 'contents';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'image', 'title', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function generateUniqueId()
    {
        do {
            $id = 'contents-' . bin2hex(random_bytes(8)); // 16 karakter random
        } while ($this->where('id', $id)->countAllResults() > 0);

        return $id;
    }

    public function insertWithId($data)
    {
        $data['id'] = $this->generateUniqueId();
        return $this->insert($data);
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class ContentModel extends Model
{
    protected $table      = 'contents';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = false ;
    protected $allowedFields = ['id', 'image', 'title', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Fungsi untuk cek apakah ID sudah ada di database
    private function isUniqueIdExists($id)
    {
        return $this->where('id', $id)->countAllResults() > 0;
    }

    // Fungsi untuk generate ID unik
    public function generateUniqueId()
    {
        do {
            $id = 'contents-' . bin2hex(random_bytes(8));
        } while ($this->isUniqueIdExists($id));

        return $id;
    }

    // Fungsi untuk insert data dengan ID unik
    public function insertWithId($data)
    {
        if (!isset($data['id']) || empty($data['id'])) {
            $data['id'] = $this->generateUniqueId();
        }

        $insert = $this->insert($data, true); 

        return $insert ? $data['id'] : false;
    }

    public function getPaginatedContents($perPage)
    {
        return $this->paginate($perPage);
    }

    // Ambil semua konten
    public function getContent()
    {
        return $this->orderBy('created_at', 'ASC')->findAll(); 
    }
}

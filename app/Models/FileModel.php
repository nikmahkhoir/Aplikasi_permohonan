<?php

namespace App\Models;

use CodeIgniter\Model;

class FileModel extends Model
{
    protected $table = 'permohonan'; // Nama tabel
    protected $primaryKey = 'id_pemohon';

    public function getFileById($id, $fileColumn)
    {
        return $this->select("$fileColumn as data")
                    ->where('id_pemohon', $id)
                    ->get()
                    ->getRowArray();
    }
}

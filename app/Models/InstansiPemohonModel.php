<?php

namespace App\Models;

use CodeIgniter\Model;

class InstansiPemohonModel extends Model
{
    protected $table = 'instansipemohon'; // Nama tabel di database
    protected $primaryKey = 'id_instansipemohon'; // Primary key tabel

    // Kolom-kolom yang dapat diakses atau dimanipulasi
    protected $allowedFields = ['id_instansipemohon', 'nama_instansipemohon'];

    // Jika ingin mengaktifkan fitur timestamps, tambahkan:
    // protected $useTimestamps = true;
}

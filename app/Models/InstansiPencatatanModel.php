<?php

namespace App\Models;

use CodeIgniter\Model;

class InstansiPencatatanModel extends Model
{
    protected $table = 'instansipencatatan'; // Nama tabel di database
    protected $primaryKey = 'id_instansipencatatan'; // Primary key tabel

    // Kolom-kolom yang dapat diakses atau dimanipulasi
    protected $allowedFields = ['id_instansipencatatan', 'nama_instansipencatatan'];

    // Jika ingin mengaktifkan fitur timestamps, tambahkan:
    // protected $useTimestamps = true;
}

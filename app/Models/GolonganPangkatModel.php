<?php

namespace App\Models;

use CodeIgniter\Model;

class GolonganPangkatModel extends Model
{
    protected $table = 'golonganpangkat'; // Nama tabel di database
    protected $primaryKey = 'id_golonganpangkat'; // Primary key tabel

    // Kolom-kolom yang dapat diakses atau dimanipulasi
    protected $allowedFields = ['id_golonganpangkat', 'nama_golonganpangkat'];

    // Jika ingin mengaktifkan fitur timestamps, tambahkan:
    // protected $useTimestamps = true;
}

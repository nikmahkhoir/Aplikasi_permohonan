<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'login'; // Nama tabel di database
    protected $primaryKey = 'id_login'; // Primary key tabel

    // Kolom-kolom yang dapat diakses atau dimanipulasi
    protected $allowedFields = ['username', 'password', 'level'];

    // Jika ingin mengaktifkan fitur timestamps, tambahkan:
    // protected $useTimestamps = true;
}

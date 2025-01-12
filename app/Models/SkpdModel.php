<?php

namespace App\Models;

use CodeIgniter\Model;

class SkpdModel extends Model
{
    protected $table = 'skpd'; // Nama tabel di database
    protected $primaryKey = 'id_skpd'; // Primary key tabel

    // Kolom-kolom yang dapat diakses atau dimanipulasi
    protected $allowedFields = ['id_skpd','kop_skpd', 'kepala_skpd', 'nip_kepala_skpd','golongan'];

    // Jika ingin mengaktifkan fitur timestamps, tambahkan:
    // protected $useTimestamps = true;
}

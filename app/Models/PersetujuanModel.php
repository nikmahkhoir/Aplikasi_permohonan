<?php

namespace App\Models;

use CodeIgniter\Model;

class PersetujuanModel extends Model
{
    protected $table = 'persetujuan'; // Nama tabel di database
    protected $primaryKey = 'id_persetujuan'; // Primary key tabel

    // Kolom-kolom yang dapat diakses atau dimanipulasi
    protected $allowedFields = [
        'tanggal_mulai',
        'tanggal_berakhir',
        'id_skpd',
        'id_golrum',
        'id_instansipencatatan',
        'id_pemohon'
    ];

    // Jika ingin mengaktifkan fitur timestamps, tambahkan:
    // protected $useTimestamps = true;
}

<?php
namespace App\Models;

use CodeIgniter\Model;

class KeluargaModel extends Model
{
    protected $table = 'keluarga'; // Nama tabel di database
    protected $primaryKey = 'id_keluarga'; // Primary key tabel

    // Kolom-kolom yang dapat diakses atau dimanipulasi
    protected $allowedFields = ['id_keluarga','id_asn', 'nama', 'usia', 'posisi','jenis_kelamin'];

    // Jika ingin mengaktifkan fitur timestamps, tambahkan:
    // protected $useTimestamps = true;
}

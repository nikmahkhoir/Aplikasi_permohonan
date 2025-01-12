<?php

namespace App\Models;

use CodeIgniter\Model;

class GolonganRumahDinasModel extends Model
{
    protected $table = 'golonganrumahdinas'; // Nama tabel di database
    protected $primaryKey = 'id_golrum'; // Primary key tabel

    // Kolom-kolom yang dapat diakses atau dimanipulasi
    protected $allowedFields = ['id_golrum', 'golongan_rumah', 'biaya_sewa'];

    // Jika ingin mengaktifkan fitur timestamps, tambahkan:
    // protected $useTimestamps = true;
}

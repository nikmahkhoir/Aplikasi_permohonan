<?php

namespace App\Models;

use CodeIgniter\Model;

class AlamatRumahDinasModel extends Model
{
    protected $table = 'alamatrumahdinas'; // Nama tabel di database
    protected $primaryKey = 'id_alamatrumahdinas'; // Primary key tabel

    // Kolom-kolom yang dapat diakses atau dimanipulasi
    protected $allowedFields = ['id_alamatrumahdinas', 'nama_alamatrumahdinas'];

    // Jika ingin mengaktifkan fitur timestamps, tambahkan:
    // protected $useTimestamps = true;
}

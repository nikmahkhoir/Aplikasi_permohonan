<?php

namespace App\Models;

use CodeIgniter\Model;

class ApproverModel extends Model
{
    protected $table = 'approver'; // Nama tabel di database
    protected $primaryKey = 'id_approver'; // Primary key tabel

    // Kolom-kolom yang dapat diakses atau dimanipulasi
    protected $allowedFields = ['id_approver', 'nama', 'nip', 'tingkatan', 'id_login'];

    // Jika ingin mengaktifkan fitur timestamps, tambahkan:
    // protected $useTimestamps = true;
}

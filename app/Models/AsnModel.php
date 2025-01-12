<?php

namespace App\Models;

use CodeIgniter\Model;

class AsnModel extends Model
{
    protected $table = 'asn'; // Nama tabel di database
    protected $primaryKey = 'id_asn'; // Primary key tabel

    // Kolom-kolom yang dapat diakses atau dimanipulasi
    protected $allowedFields = ['id_asn', 'nama', 'gelar_depan', 'gelar_belakang', 'nip', 'no_ktp', 'no_kk', 'npwp', 'alamat', 'no_hp', 'id_login','id_instansipemohon','jabatan','gaji_pokok','id_golonganpangkat'];

    // Jika ingin mengaktifkan fitur timestamps, tambahkan:
    // protected $useTimestamps = true;
}

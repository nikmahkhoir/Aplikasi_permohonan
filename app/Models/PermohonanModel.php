<?php

namespace App\Models;

use CodeIgniter\Model;

class PermohonanModel extends Model
{
    protected $table = 'permohonan'; // Nama tabel di database
    protected $primaryKey = 'id_pemohon'; // Primary key tabel

    // Kolom-kolom yang dapat diakses atau dimanipulasi
    protected $allowedFields = ['id_pemohon', 'bersedia_menaati_peraturan', 'id_alamatrumahdinas', 'nomor_rumah_dinas', 'rumah_ditempati', 'tanggal_ditempati', 'keterangan', 'file_sk', 'file_ktp', 'file_kk', 'file_pas_foto', 'file_foto_rumah', 'id_asn','status','id_approver'];

    // Jika ingin mengaktifkan fitur timestamps, tambahkan:
    // protected $useTimestamps = true;
}

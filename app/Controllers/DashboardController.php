<?php

namespace App\Controllers;

use App\Models\ApproverModel;
use App\Models\AsnModel;
use App\Models\KeluargaModel;
use App\Models\PersetujuanModel; 
use App\Models\PermohonanModel;  
use CodeIgniter\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // Initialize models
        $asnModel = new AsnModel();
        $approverModel = new ApproverModel();
        $permohonanModel = new PermohonanModel();
        $persetujuanModel = new PersetujuanModel();

        // Get counts from each table
        $data['jumlahAsn'] = $asnModel->countAll();
        $data['jumlahApprover'] = $approverModel->countAll();
        $jumlahPermohonan = $permohonanModel->join('asn','asn.id_asn=permohonan.id_asn')->findAll();
        $jumlahPersetujuan = $persetujuanModel->join('permohonan','permohonan.id_pemohon=persetujuan.id_pemohon','left')->join('asn','asn.id_asn=permohonan.id_asn')->findAll();

        $data['jumlahPermohonan']=count($jumlahPermohonan);
        $data['jumlahPersetujuan']=count($jumlahPersetujuan);

        // Kirim data ke view
        return view('layout/header')
            . view('layout/menu')
            . view('index', $data)
            . view('layout/footer');
    }
}

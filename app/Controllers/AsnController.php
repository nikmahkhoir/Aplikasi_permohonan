<?php

namespace App\Controllers;

use App\Models\AsnModel; // Assuming you have an AsnModel for the asn table
use CodeIgniter\Controller;
use App\Models\InstansiPemohonModel; // Import the InstansiPemohonModel
use App\Models\GolonganPangkatModel;

class AsnController extends Controller
{
    protected $AsnModel;
    protected $InstansiPemohonModel;
    protected $GolonganPangkatModel;

    public function __construct()
    {
        // Inisialisasi model
        $this->AsnModel = new AsnModel();
        $this->InstansiPemohonModel = new InstansiPemohonModel(); // Initialize the InstansiPemohonModel
        $this->GolonganPangkatModel = new GolonganPangkatModel();
    }

    public function index()
    {
        // Ambil semua data ASN
        $data['asn'] = $this->AsnModel
        ->join('instansipemohon','asn.id_instansipemohon=instansipemohon.id_instansipemohon','left')
        ->join('golonganpangkat','asn.id_golonganpangkat=golonganpangkat.id_golonganpangkat','left')
        ->findAll();
        echo view('layout/header');
        echo view('layout/menu');
        echo view('data-asn', $data);
        echo view('layout/footer');
    }

    public function create()
    {
        $data['instansipemohon'] = $this->InstansiPemohonModel->findAll();
        $data['golongan'] = $this->GolonganPangkatModel->findAll();
        echo view('layout/header'); 
        echo view('layout/menu');
        echo view('input-asn',$data);
        echo view('layout/footer');
    }

    public function store()
    {
        $this->AsnModel->save([
            'nama' => $this->request->getPost('nama'),
            'gelar_depan' => $this->request->getPost('gelar_depan'),
            'gelar_belakang' => $this->request->getPost('gelar_belakang'),
            'nip' => $this->request->getPost('nip'),
            'no_ktp' => $this->request->getPost('no_ktp'),
            'no_kk' => $this->request->getPost('no_kk'),
            'npwp' => $this->request->getPost('npwp'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp'),
            'id_instansipemohon' => $this->request->getPost('instansi_pemohon'),
            'id_golonganpangkat' => $this->request->getPost('id_golonganpangkat'),
            'jabatan' => $this->request->getPost('jabatan'),
            'gaji_pokok' => $this->request->getPost('gaji_pokok'),
  
        ]);

        return redirect()->to('/asn')->with('success', 'Data ASN berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data['instansipemohon'] = $this->InstansiPemohonModel->findAll();
        $data['asn'] = $this->AsnModel->find($id);
        $data['golongan'] = $this->GolonganPangkatModel->findAll();
        echo view('layout/header'); 
        echo view('layout/menu');
        echo view('edit-asn', $data);
        echo view('layout/footer');
    }

    public function update($id)
    {
        $this->AsnModel->update($id, [
            'nama' => $this->request->getPost('nama'),
            'gelar_depan' => $this->request->getPost('gelar_depan'),
            'gelar_belakang' => $this->request->getPost('gelar_belakang'),
            'nip' => $this->request->getPost('nip'),
            'no_ktp' => $this->request->getPost('no_ktp'),
            'no_kk' => $this->request->getPost('no_kk'),
            'npwp' => $this->request->getPost('npwp'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp'),
            'id_instansipemohon' => $this->request->getPost('instansi_pemohon'),
            'id_golonganpangkat' => $this->request->getPost('id_golonganpangkat'),
            'jabatan' => $this->request->getPost('jabatan'),
            'gaji_pokok' => $this->request->getPost('gaji_pokok'),
      
        ]);

        return redirect()->to('/asn')->with('success', 'Data ASN berhasil diupdate.');
    }

    public function delete($id)
    {
        $this->AsnModel->delete($id);

        return redirect()->to('/asn')->with('success', 'Data ASN berhasil dihapus.');
    }
}

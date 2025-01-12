<?php

namespace App\Controllers;

use App\Models\InstansiPemohonModel; // Assuming you have an InstansiPemohonModel for the instansipemohon table
use CodeIgniter\Controller;

class InstansiPemohonController extends Controller
{
    protected $InstansiPemohonModel;

    public function __construct()
    {
        // Inisialisasi model
        $this->InstansiPemohonModel = new InstansiPemohonModel();
    }

    public function index()
    {
        // Ambil semua data Instansi Pemohon
        $data['instansipemohon'] = $this->InstansiPemohonModel->findAll();

        // Kirim data ke view
        echo view('layout/header');
        echo view('layout/menu');
        echo view('data-instansipemohon', $data);
        echo view('layout/footer');
    }

    public function create()
    {
     

        echo view('layout/header'); 
        echo view('layout/menu');
        echo view('input-instansipemohon');
        echo view('layout/footer');
    }

    public function store()
    {
        $this->InstansiPemohonModel->save([
            'nama_instansipemohon' => $this->request->getPost('nama_instansipemohon'),
        ]);

        return redirect()->to('/instansipemohon')->with('success', 'Data Instansi Pemohon berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data['instansipemohon'] = $this->InstansiPemohonModel->find($id);
        echo view('layout/header'); 
        echo view('layout/menu');
        echo view('edit-instansipemohon', $data);
        echo view('layout/footer');
    }

    public function update($id)
    {
        $this->InstansiPemohonModel->update($id, [
            'nama_instansipemohon' => $this->request->getPost('nama_instansipemohon'),
        ]);

        return redirect()->to('/instansipemohon')->with('success', 'Data Instansi Pemohon berhasil diupdate.');
    }

    public function delete($id)
    {
        $this->InstansiPemohonModel->delete($id);

        return redirect()->to('/instansipemohon')->with('success', 'Data Instansi Pemohon berhasil dihapus.');
    }
}

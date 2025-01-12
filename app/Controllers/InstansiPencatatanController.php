<?php
namespace App\Controllers;

use App\Models\InstansiPencatatanModel; // Use the correct model for golongan rumah dinas
use CodeIgniter\Controller;

class InstansiPencatatanController extends Controller
{
    protected $InstansiPencatatanModel;

    public function __construct()
    {
        // Inisialisasi model
        $this->InstansiPencatatanModel = new InstansiPencatatanModel();
    }

    public function index()
    {
        $data['instansipencatatan'] = $this->InstansiPencatatanModel->findAll();
        echo view('layout/header'); 
        echo view('layout/menu');
        echo view('data-instansipencatatan', $data); // Assuming you have a view for golongan rumah
        echo view('layout/footer');
    }

    public function create()
    {
        echo view('layout/header'); 
        echo view('layout/menu');
        echo view('input-instansipencatatan'); // Assuming you have a view for creating golongan rumah
        echo view('layout/footer');
    }

    public function store()
    {
        $this->InstansiPencatatanModel->save([
            'nama_instansipencatatan' => $this->request->getPost('nama_instansipencatatan'),
           
        ]);

        return redirect()->to('/instansipencatatan')->with('success', 'Data Instansi Pencatatan Rumah Dinas Berhasil Ditambahkan.');
    }

    public function edit($id)
    {
        $data['instansipencatatan'] = $this->InstansiPencatatanModel->find($id);
        echo view('layout/header'); 
        echo view('layout/menu');
        echo view('edit-instansipencatatan', $data); // Assuming you have a view for editing golongan rumah
        echo view('layout/footer');
    }

    public function update($id)
    {
        $this->InstansiPencatatanModel->update($id, [
           'nama_instansipencatatan' => $this->request->getPost('nama_instansipencatatan'),
            
        ]);

        return redirect()->to('/instansipencatatan')->with('success', 'Data Instansi Pencatatan berhasil diupdate.');
    }

    public function delete($id)
    {
        $this->InstansiPencatatanModel->delete($id);

        return redirect()->to('/instansipencatatan')->with('success', 'Data Instansi Pencatatan berhasil dihapus.');
    }
}

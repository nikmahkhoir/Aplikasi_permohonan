<?php
namespace App\Controllers;

use App\Models\GolonganRumahDinasModel; // Use the correct model for golongan rumah dinas
use CodeIgniter\Controller;

class GolonganRumahDinasController extends Controller
{
    protected $GolonganRumahDinasModel;

    public function __construct()
    {
        // Inisialisasi model
        $this->GolonganRumahDinasModel = new GolonganRumahDinasModel();
    }

    public function index()
    {
        $data['golongan_rumah'] = $this->GolonganRumahDinasModel->findAll();
        echo view('layout/header'); 
        echo view('layout/menu');
        echo view('data-golonganrumahdinas', $data); // Assuming you have a view for golongan rumah
        echo view('layout/footer');
    }

    public function create()
    {
        echo view('layout/header'); 
        echo view('layout/menu');
        echo view('input-golonganrumahdinas'); // Assuming you have a view for creating golongan rumah
        echo view('layout/footer');
    }

    public function store()
    {
        $this->GolonganRumahDinasModel->save([
            'golongan_rumah' => $this->request->getPost('golongan_rumah'),
            'biaya_sewa' => $this->request->getPost('biaya_sewa'),
        ]);

        return redirect()->to('/golonganrumahdinas')->with('success', 'Data Golongan Rumah Dinas berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data['golonganrumahdinas'] = $this->GolonganRumahDinasModel->find($id);
        echo view('layout/header'); 
        echo view('layout/menu');
        echo view('edit-golonganrumahdinas', $data); // Assuming you have a view for editing golongan rumah
        echo view('layout/footer');
    }

    public function update($id)
    {
        $this->GolonganRumahDinasModel->update($id, [
            'golongan_rumah' => $this->request->getPost('golongan_rumah'),
            'biaya_sewa' => $this->request->getPost('biaya_sewa'),
        ]);

        return redirect()->to('/golonganrumahdinas')->with('success', 'Data Golongan Rumah Dinas berhasil diupdate.');
    }

    public function delete($id)
    {
        $this->GolonganRumahDinasModel->delete($id);

        return redirect()->to('/golonganrumahdinas')->with('success', 'Data Golongan Rumah Dinas berhasil dihapus.');
    }
}

<?php
namespace App\Controllers;

use App\Models\KeluargaModel; // Assuming you have a model for keluarga
use CodeIgniter\Controller;

class KeluargaController extends Controller
{
    protected $KeluargaModel;

    public function __construct()
    {
        // Inisialisasi model
        $this->KeluargaModel = new KeluargaModel();
    }

    public function index($id)
    {
        $data['keluarga'] = $this->KeluargaModel
        ->where('id_asn', $id)
        ->findAll();
        $data['id_asn']=$id;
        echo view('layout/header'); 
        echo view('layout/menu');
        echo view('data-keluarga', $data); // Assuming you have a view for keluarga
        echo view('layout/footer');
    }

    public function create($id)
    {
        $data['id_asn']=$id;
        // var_dump($id);exit;
        echo view('layout/header'); 
        echo view('layout/menu');
        echo view('input-keluarga',$data); // Assuming you have a view for creating keluarga
        echo view('layout/footer');
    }

    public function store($id)
    {
        $this->KeluargaModel->save([
            'id_asn' => $id,
            'nama' => $this->request->getPost('nama'),
            'usia' => $this->request->getPost('usia'),
            'posisi' => $this->request->getPost('posisi'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'), // Added jenis_kelamin
        ]);

        return redirect()->to('/keluarga/'.$id)->with('success', 'Data Keluarga berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data['keluarga'] = $this->KeluargaModel->find($id);
        echo view('layout/header'); 
        echo view('layout/menu');
        echo view('edit-keluarga', $data); // Assuming you have a view for editing keluarga
        echo view('layout/footer');
    }

    public function update($id)
    {
        $this->KeluargaModel->update($id, [
            'nama' => $this->request->getPost('nama'),
            'usia' => $this->request->getPost('usia'),
            'posisi' => $this->request->getPost('posisi'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'), // Added jenis_kelamin
        ]);

        return redirect()->to('/keluarga/'.$this->request->getPost('id_asn'))->with('success', 'Data Keluarga berhasil diupdate.');
    }

    public function delete($id)
    {
        $data['keluarga'] = $this->KeluargaModel->find($id);
        // var_dump($data['keluarga']['id_asn']);exit;
        $this->KeluargaModel->delete($id);

        return redirect()->to('/keluarga/'.$data['keluarga']['id_asn'])->with('success', 'Data Keluarga berhasil dihapus.');
    }
}

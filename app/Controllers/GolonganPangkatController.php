<?php
namespace App\Controllers;

use App\Models\GolonganPangkatModel; // Updated model to GolonganPangkatModel
use CodeIgniter\Controller;

class GolonganPangkatController extends Controller // Updated class name
{
    protected $GolonganPangkatModel; // Updated variable name

    public function __construct()
    {
        // Inisialisasi model
        $this->GolonganPangkatModel = new GolonganPangkatModel(); // Updated model initialization
    }

    public function index()
    {
        // Ambil semua data golongan pangkat
        $data['golonganpangkat'] = $this->GolonganPangkatModel->findAll(); // Updated data variable
        // var_dump($data);exit;
        // Kirim data ke view
        echo view('layout/header');
        echo view('layout/menu');
        echo view('data-golonganpangkat', $data); // Updated view name
        echo view('layout/footer');
    }

    public function create()
    {
        echo view('layout/header'); 
        echo view('layout/menu');
        echo view('input-golonganpangkat'); // Updated view name
        echo view('layout/footer');
    }

    public function store()
    {
        $this->GolonganPangkatModel->save([
            'nama_golonganpangkat' => $this->request->getPost('nama_golonganpangkat'), // Updated field name
        ]);

        return redirect()->to('/golonganpangkat')->with('success', 'Data golongan pangkat berhasil ditambahkan.'); // Updated redirect path
    }

    public function edit($id)
    {
        $data['golonganpangkat'] = $this->GolonganPangkatModel->find($id); // Updated data variable
        echo view('layout/header'); 
        echo view('layout/menu');
        echo view('edit-golonganpangkat', $data); // Updated view name
        echo view('layout/footer');
    }

    public function update($id)
    {
        $this->GolonganPangkatModel->update($id, [
            'nama_golonganpangkat' => $this->request->getPost('nama_golonganpangkat'), // Updated field name
        ]);

        return redirect()->to('/golonganpangkat')->with('success', 'Data golongan pangkat berhasil diupdate.'); // Updated redirect path
    }

    public function delete($id)
    {
        $this->GolonganPangkatModel->delete($id);

        return redirect()->to('/golonganpangkat')->with('success', 'Data golongan pangkat berhasil dihapus.'); // Updated redirect path
    }
}

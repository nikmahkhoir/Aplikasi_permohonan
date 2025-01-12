<?php
namespace App\Controllers;

use App\Models\ApproverModel;
use App\Models\LoginModel;
use CodeIgniter\Controller;

class ApproverController extends Controller
{
    protected $ApproverModel;
    protected $LoginModel;

    public function __construct()
    {
        // Inisialisasi model
        $this->ApproverModel = new ApproverModel();
        $this->LoginModel = new LoginModel();
    }

    public function index()
    {
        // Ambil semua data approver
        $data['approver'] = $this->ApproverModel->findAll();
        // var_dump($data);exit;
        // Kirim data ke view
        echo view('layout/header');
        echo view('layout/menu');
        echo view('data-approver', $data);
        echo view('layout/footer');
    }

    public function create()
    {
        echo view('layout/header'); 
        echo view('layout/menu');
        echo view('input-approver');
        echo view('layout/footer');
    }

    public function store()
    {
        // Simpan data ke tabel login terlebih dahulu
        $loginData = [
            'username' => $this->request->getPost('username'), // Assuming username is provided in the form
            'password' => md5($this->request->getPost('password')), // Hash the password
            'level'=>'approver'
        ];
        
        $this->LoginModel->save($loginData);
        $id_login = $this->LoginModel->insertID(); // Get the last inserted ID for login

        // Simpan data ke tabel approver dengan id_login yang baru
        $this->ApproverModel->save([
            'nama' => $this->request->getPost('nama'),
            'nip' => $this->request->getPost('nip'),
            'tingkatan' => $this->request->getPost('tingkatan'),
            'id_login' => $id_login,
        ]);

        return redirect()->to('/approver')->with('success', 'Data approver berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data['approver'] = $this->ApproverModel->find($id);
        echo view('layout/header'); 
        echo view('layout/menu');
        echo view('edit-approver', $data);
        echo view('layout/footer');
    }

    public function update($id)
    {
        $this->ApproverModel->update($id, [
            'nama' => $this->request->getPost('nama'),
            'nip' => $this->request->getPost('nip'),
            'tingkatan' => $this->request->getPost('tingkatan'),
            'id_login' => $this->request->getPost('id_login'),
        ]);

        return redirect()->to('/approver')->with('success', 'Data approver berhasil diupdate.');
    }

    public function delete($id)
    {
        $this->ApproverModel->delete($id);

        return redirect()->to('/approver')->with('success', 'Data approver berhasil dihapus.');
    }
}


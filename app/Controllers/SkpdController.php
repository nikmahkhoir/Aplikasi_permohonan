<?php

namespace App\Controllers;

use App\Models\SkpdModel;
use CodeIgniter\Controller;

use Config\Services;
class SkpdController extends Controller
{
    protected $SkpdModel;

    public function __construct()
    {
        // Inisialisasi model
        $this->email = Services::email();
        $this->SkpdModel = new SkpdModel();
        
    }

    public function index()
    {
        // Ambil semua data skpd
        $data['skpd'] = $this->SkpdModel->findAll();

        // Kirim data ke view
        echo view('layout/header');
        echo view('layout/menu');
        echo view('data-skpd', $data);
        echo view('layout/footer');
    }

    public function create()
    {
        echo view('layout/header'); 
        echo view('layout/menu');
        echo view('input-skpd');
        echo view('layout/footer');
    }

    public function store()
    {
        $this->SkpdModel->save([
            'kop_skpd' => $this->request->getPost('kop_skpd'),
            'kepala_skpd' => $this->request->getPost('kepala_skpd'),
            'nip_kepala_skpd' => $this->request->getPost('nip_kepala_skpd'),
            'golongan' => $this->request->getPost('golongan'), // Added golongan
        ]);

        $message = "<h1>Laporan Pengaduan</h1>Berhasil menambahkan data SKPD ".$this->request->getPost('kepala_skpd');
    
        //memanggil private function sendEmail
        $this->sendEmail('nikmatulkhoiri03@gmail.com', 'Pengaduan', $message);

        return redirect()->to('/skpd')->with('success', 'Data SKPD berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data['skpd'] = $this->SkpdModel->find($id);
        echo view('layout/header'); 
        echo view('layout/menu');
        echo view('edit-skpd', $data);
        echo view('layout/footer');
    }

    public function update($id)
    {
        $this->SkpdModel->update($id, [
            'kop_skpd' => $this->request->getPost('kop_skpd'),
            'kepala_skpd' => $this->request->getPost('kepala_skpd'),
            'nip_kepala_skpd' => $this->request->getPost('nip_kepala_skpd'),
            'golongan' => $this->request->getPost('golongan'), // Added golongan
        ]);

        return redirect()->to('/skpd')->with('success', 'Data SKPD berhasil diupdate.');
    }

    public function delete($id)
    {
        $this->SkpdModel->delete($id);

        return redirect()->to('/skpd')->with('success', 'Data SKPD berhasil dihapus.');
    }
    
    private function sendEmail($to, $title, $message)
    {
        $this->email->setFrom('bpkad@gmail.com','Admin');
        $this->email->setTo($to);

        // $this->email->attach($attachment);

        $this->email->setSubject($title);
        $this->email->setMessage($message);

        if(! $this->email->send()){
            return false;
        } else {
            return true;
        }
    }
}

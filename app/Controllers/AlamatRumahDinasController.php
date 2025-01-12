<?php
namespace App\Controllers;

use App\Models\AlamatRumahDinasModel; // Assuming you have a model for alamat rumah dinas
use CodeIgniter\Controller;

class AlamatRumahDinasController extends Controller
{
    protected $AlamatRumahDinasModel;

    public function __construct()
    {
        // Inisialisasi model
        $this->AlamatRumahDinasModel = new AlamatRumahDinasModel();
    }

    public function index()
    {
        $data['alamatrumahdinas'] = $this->AlamatRumahDinasModel->findAll();
        echo view('layout/header'); 
        echo view('layout/menu');
        echo view('data-alamatrumahdinas', $data); // Assuming you have a view for alamat rumah dinas
        echo view('layout/footer');
    }

    public function create()
    {
        echo view('layout/header'); 
        echo view('layout/menu');
        echo view('input-alamatrumahdinas'); // Assuming you have a view for creating alamat rumah dinas
        echo view('layout/footer');
    }

    public function store()
    {
        $this->AlamatRumahDinasModel->save([
            'nama_alamatrumahdinas' => $this->request->getPost('nama_alamatrumahdinas'),
      
        ]);

        return redirect()->to('/alamatrumahdinas')->with('success', 'Data Alamat Rumah Dinas berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data['alamatrumahdinas'] = $this->AlamatRumahDinasModel->find($id);
        echo view('layout/header'); 
        echo view('layout/menu');
        echo view('edit-alamatrumahdinas', $data); // Assuming you have a view for editing alamat rumah dinas
        echo view('layout/footer');
    }

    public function update($id)
    {
        $this->AlamatRumahDinasModel->update($id, [
            'nama_alamatrumahdinas' => $this->request->getPost('nama_alamatrumahdinas'),
         
        ]);

        return redirect()->to('/alamatrumahdinas')->with('success', 'Data Alamat Rumah Dinas berhasil diupdate.');
    }

    public function delete($id)
    {
        $this->AlamatRumahDinasModel->delete($id);

        return redirect()->to('/alamatrumahdinas')->with('success', 'Data Alamat Rumah Dinas berhasil dihapus.');
    }
}

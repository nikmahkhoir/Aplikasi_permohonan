<?php

namespace App\Controllers;  

use App\Models\PermohonanModel;
use App\Models\AsnModel;
use App\Models\InstansiPemohonModel; // Import the InstansiPemohonModel
use App\Models\KeluargaModel;
use App\Models\AlamatRumahDinasModel;
use App\Models\SkpdModel;
use App\Models\GolonganRumahDinasModel; // Use the correct model for golongan rumah dinas
use App\Models\InstansiPencatatanModel;
use App\Models\PersetujuanModel;
use App\Models\ApproverModel;

use CodeIgniter\Controller;
use Config\Services;
class PermohonanController extends Controller
{
    protected $PermohonanModel;
    protected $AsnModel;
    protected $InstansiPemohonModel; // Declare the InstansiPemohonModel
    protected $KeluargaModel;
    protected $AlamatRumahDinasModel;
    protected $SkpdModel;
    protected $GolonganRumahDinasModel;
    protected $InstansiPencatatanModel;
    protected $PersetujuanModel;
    protected $ApproverModel;


    public function __construct()
    {
        // Inisialisasi model
        $this->PermohonanModel = new PermohonanModel();
        $this->AsnModel = new AsnModel();
        $this->InstansiPemohonModel = new InstansiPemohonModel(); // Initialize the InstansiPemohonModel
        $this->KeluargaModel = new KeluargaModel();
        $this->AlamatRumahDinasModel = new AlamatRumahDinasModel();
        $this->SkpdModel = new SkpdModel();
        $this->GolonganRumahDinasModel = new GolonganRumahDinasModel();
        $this->InstansiPencatatanModel = new InstansiPencatatanModel();
        $this->PersetujuanModel = new PersetujuanModel();
        $this->ApproverModel = new ApproverModel();
        $this->email = Services::email();
    }
    
    private function sendEmail($to, $title, $message){

		$this->email->setFrom('anangafh@gmail.com','BPKAD');
		$this->email->setTo($to);

		// $this->email->attach($attachment);

		$this->email->setSubject($title);
		$this->email->setMessage($message);

		if(! $this->email->send()){
			return false;
		}else{
			return true;
		}
	}

    public function index()
    {
        $data['pemohonan'] = $this->PermohonanModel->findAll();

        $data['instansipemohon'] = $this->InstansiPemohonModel->findAll(); // Get all instansi pemohon
        $data['asn'] = $this->AsnModel->findAll(); // Get all ASN data

        // var_dump($data);exit;
       
         // Kirim data ke view
         echo view('layout/header');
         echo view('layout/menu');
         echo view('data-permohonan', $data);
         echo view('layout/footer');
       
    }

    public function baru()
    {
        if (session('level')=='asn') {
            $data['pemohon'] = $this->PermohonanModel
        ->join('asn','asn.id_asn=permohonan.id_asn','left')
        ->where('status','tunggu')
        ->where('id_login',session('id_login'))
        ->findAll();
        }else{

            $data['pemohon'] = $this->PermohonanModel
            ->join('asn','asn.id_asn=permohonan.id_asn','left')
            ->where('status','tunggu')
            ->findAll();
        }
         echo view('layout/header');
         echo view('layout/menu');
         echo view('data-pemohon_baru', $data);
         echo view('layout/footer');
       
    }

    public function create()
    {
        // var_dump(session('id_login'));exit;
        if (session('level')=='asn') {
            $id_login=session('id_login');
            $data['asn'] = $this->AsnModel->where('id_login',$id_login)->findAll();
        }else{

            $data['asn'] = $this->AsnModel->findAll();
        }
        $data['alamatrumahdinas'] = $this->AlamatRumahDinasModel->findAll(); // Get all instansi pemohon for the create view
        echo view('layout/header'); 
        echo view('layout/menu');
        echo view('input-permohonan', $data);
        echo view('layout/footer');
    }

    public function store()
{
    // Check if nomor_rumah_dinas already exists in permohonan
    $id_asn = $this->request->getPost('id_asn');
    $cekKK = $this->AsnModel->where('id_asn', $id_asn)->first();

    $valKK = $this->PermohonanModel
        ->join('asn', 'asn.id_asn=permohonan.id_asn')
        ->where('permohonan.id_asn', $id_asn)
        ->where('no_kk', $cekKK['no_kk'])
        ->where('status', 'terima')
        ->first();

    if ($valKK) {
        if ($cekKK['no_kk'] == $valKK['no_kk']) {
            return redirect()->to('/pemohon_baru')->with('error', 'Proses permohonan gagal. Keluarga anda sudah melakukan permohonan permohonan.');
        }
    }

    $nomorRumahDinas = $this->request->getPost('nomor_rumah_dinas');
    $existingPermohonan = $this->PermohonanModel->where('nomor_rumah_dinas', $nomorRumahDinas)->first();

    if ($existingPermohonan) {
        return redirect()->to('/pemohon_baru')->with('error', 'Proses permohonan gagal. Nomor rumah dinas sudah ada di permohonan.');
    }

    // Ambil file yang diupload
    $fileSK = $this->request->getFile('file_sk');
    $fileKTP = $this->request->getFile('file_ktp');
    $fileKK = $this->request->getFile('file_kk');
    $filePasFoto = $this->request->getFile('file_pas_foto');
    $fileFotoRumah = $this->request->getFile('file_foto_rumah');

    // Ukuran maksimum file dalam byte
    $maxFileSizeSK = 102400; // 100 KB untuk SK
    $maxFileSizeFoto = 122880; // 120 KB untuk Foto

    // Variabel untuk menyimpan hasil validasi
    $fileSKBase64 = null;
    $fileKTPBase64 = null;
    $fileKKBase64 = null;
    $filePasFotoBase64 = null;
    $fileFotoRumahBase64 = null;
    $errors = [];

    // Validasi file SK
    if ($fileSK && $fileSK->isValid() && !$fileSK->hasMoved()) {
        if ($fileSK->getSize() > $maxFileSizeSK) {
            $errors[] = 'File SK terlalu besar. Maksimal ukuran file adalah 100 KB.';
        } else {
            $fileSKBase64 = base64_encode(file_get_contents($fileSK->getTempName()));
        }
    }

    // Validasi file Pas Foto
    if ($filePasFoto && $filePasFoto->isValid() && !$filePasFoto->hasMoved()) {
        if ($filePasFoto->getSize() > $maxFileSizeFoto) {
            $errors[] = 'File Pas Foto terlalu besar. Maksimal ukuran file adalah 120 KB.';
        } else {
            $filePasFotoBase64 = base64_encode(file_get_contents($filePasFoto->getTempName()));
        }
    }

    // Validasi file KTP
    if ($fileKTP && $fileKTP->isValid() && !$fileKTP->hasMoved()) {
        if ($fileKTP->getSize() > $maxFileSizeFoto) {
            $errors[] = 'File KTP terlalu besar. Maksimal ukuran file adalah 120 KB.';
        } else {
            $fileKTPBase64 = base64_encode(file_get_contents($fileKTP->getTempName()));
        }
    }

    // Validasi file KK
    if ($fileKK && $fileKK->isValid() && !$fileKK->hasMoved()) {
        if ($fileKK->getSize() > $maxFileSizeFoto) {
            $errors[] = 'File KK terlalu besar. Maksimal ukuran file adalah 120 KB.';
        } else {
            $fileKKBase64 = base64_encode(file_get_contents($fileKK->getTempName()));
        }
    }

    // Validasi file Foto Rumah
    if ($fileFotoRumah && $fileFotoRumah->isValid() && !$fileFotoRumah->hasMoved()) {
        if ($fileFotoRumah->getSize() > $maxFileSizeFoto) {
            $errors[] = 'File Foto Rumah terlalu besar. Maksimal ukuran file adalah 120 KB.';
        } else {
            $fileFotoRumahBase64 = base64_encode(file_get_contents($fileFotoRumah->getTempName()));
        }
    }

    // Jika ada error, kembalikan dengan error message, tetapi data lainnya tetap disimpan
    if (!empty($errors)) {
        return redirect()->back()->withInput()->with('error', implode('<br>', $errors));
    }

    // Simpan data ke database
    $this->PermohonanModel->save([
        'id_asn' => $this->request->getPost('id_asn'),
        'bersedia_menaati_peraturan' => $this->request->getPost('bersedia_menaati_peraturan'),
        'id_alamatrumahdinas' => $this->request->getPost('id_alamatrumahdinas'),
        'nomor_rumah_dinas' => $this->request->getPost('nomor_rumah_dinas'),
        'rumah_ditempati' => $this->request->getPost('rumah_ditempati'),
        'tanggal_ditempati' => $this->request->getPost('tanggal_ditempati'),
        'keterangan' => $this->request->getPost('keterangan'),
        'file_sk' => $fileSKBase64,
        'file_ktp' => $fileKTPBase64,
        'file_kk' => $fileKKBase64,
        'file_pas_foto' => $filePasFotoBase64,
        'file_foto_rumah' => $fileFotoRumahBase64,
        'status' => 'tunggu'
    ]);

    return redirect()->to('/pemohon_baru')->with('success', 'Data Permohonan berhasil ditambahkan.');
}


    public function edit($id)
    {
        $data['permohonan'] = $this->PermohonanModel->find($id);
        $data['instansipemohon'] = $this->InstansiPemohonModel->findAll(); // Get all instansi pemohon for the edit view
        $data['asn'] = $this->AsnModel->findAll(); // Get all ASN data for the edit view
        echo view('layout/header'); 
        echo view('layout/menu');
        echo view('edit-permohonan', $data);
        echo view('layout/footer');
    }

    public function update($id)
{
    // Validasi dan ambil input data
    $data = [
        'nama_pemohon' => $this->request->getPost('nama_pemohon'),
        'nip' => $this->request->getPost('nip'),
        'no_hp' => $this->request->getPost('no_hp'),
        'jabatan' => $this->request->getPost('jabatan'),
        'gaji_pokok' => $this->request->getPost('gaji_pokok'),
        'golongan_pangkat' => $this->request->getPost('golongan_pangkat'),
        'alamat_sekarang' => $this->request->getPost('alamat_sekarang'),
        'bersedia_menaati' => $this->request->getPost('bersedia_menaati_peraturan'),
        'alamat_rumah_dinas' => $this->request->getPost('alamat_rumah_dinas'),
        'nomor_rumah_dinas' => $this->request->getPost('nomor_rumah_dinas'),
        'rumah_ditempati' => $this->request->getPost('rumah_ditempati'),
        'tanggal_ditempati' => $this->request->getPost('tanggal_ditempati'),
        'keterangan' => $this->request->getPost('keterangan'),
        'id_keluarga' => '1',
    ];

    // Ukuran maksimal file (dalam KB)
    $maxFileSize = [
        'file_sk' => 100 * 1024, // 100 KB
        'file_ktp' => 120 * 1024, // 120 KB
        'file_kk' => 120 * 1024, // 120 KB
        'file_pas_foto' => 120 * 1024, // 120 KB
        'file_foto_rumah' => 120 * 1024, // 120 KB
    ];

    // File upload field names
    $fileFields = ['file_sk', 'file_ktp', 'file_kk', 'file_pas_foto', 'file_foto_rumah'];

    foreach ($fileFields as $field) {
        $file = $this->request->getFile($field);
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Validasi ukuran file
            if ($file->getSize() > $maxFileSize[$field]) {
                return redirect()->back()->withInput()->with('error', ucfirst(str_replace('_', ' ', $field)) . ' tidak boleh lebih dari ' . ($maxFileSize[$field] / 1024) . 'KB.');
            }

            // Hapus file lama jika ada
            $existingData = $this->PermohonanModel->find($id);
            if (!empty($existingData[$field])) {
                $oldFilePath = FCPATH . 'uploads/permohonan/' . $existingData[$field];
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }

            // Simpan file baru
            $newFileName = $file->getRandomName();
            $file->move('uploads/permohonan', $newFileName);
            $data[$field] = $newFileName;
        }
    }

    // Update data ke database
    $this->PermohonanModel->update($id, $data);

    return redirect()->to('/pemohon_baru')->with('success', 'Data Permohonan berhasil diperbarui.');
}

     
    

    public function delete($id)
    {
        // var_dump($id);exit;
        $this->PermohonanModel->delete($id);

        return redirect()->to('/pemohon_baru')->with('success', 'Data Permohonan berhasil dihapus.');
    }
    
    public function pemohonBaru()
    {
        // Ambil data permohonan dengan status "baru"
        $data['pemohon_baru'] = $this->PermohonanModel->where('status', 'baru')->findAll();

        // Kirim data ke view
        echo view('layout/header');
        echo view('layout/menu');
        echo view('permohonan_baru', $data); // View untuk menampilkan daftar pemohon baru
        echo view('layout/footer');
    }

    public function detailPermohonan($id)
    {
        // Ambil data permohonan berdasarkan ID dan join dengan alamatrumahdinas, asn, golonganpangkat
        $data['skpd'] = $this->SkpdModel->findAll();
        $data['golrum'] = $this->GolonganRumahDinasModel->findAll();
        $data['pencatatan'] = $this->InstansiPencatatanModel->findAll();
        $data['jumlah_keluarga'] = $this->KeluargaModel
            ->join('asn', 'asn.id_asn = keluarga.id_asn')
            ->join('permohonan', 'permohonan.id_asn = asn.id_asn')
            ->where('permohonan.id_pemohon', $id)
            ->countAllResults();
            // var_dump('permohonan');exit;
        $data['permohonan'] = $this->PermohonanModel
            ->select('permohonan.*, alamatrumahdinas.nama_alamatrumahdinas, asn.*, golonganpangkat.nama_golonganpangkat,instansipemohon.*')
            ->join('alamatrumahdinas', 'alamatrumahdinas.id_alamatrumahdinas = permohonan.id_alamatrumahdinas', 'left')
            ->join('asn', 'asn.id_asn = permohonan.id_asn', 'left')
            ->join('golonganpangkat', 'golonganpangkat.id_golonganpangkat = asn.id_golonganpangkat', 'left')
            ->join('instansipemohon', 'instansipemohon.id_instansipemohon = asn.id_instansipemohon', 'left')
            ->find($id);

        if (!$data['permohonan']) {
            // Jika data tidak ditemukan, kembalikan ke halaman pemohon baru
            return redirect()->to('/permohonan/pemohonBaru')->with('error', 'Data permohonan tidak ditemukan!');
        }

        // Kirim data ke view
        echo view('layout/header');
        echo view('layout/menu');
        echo view('detail_permohonan', $data); // View untuk menampilkan detail permohonan
        echo view('layout/footer');
    }

    public function getPemohonDetails($id)
    {
        $model = new ASNModel(); // Inisialisasi model ASN

        $keluarga = $this->KeluargaModel->where('id_asn', $id)->countAllResults();

        // Ambil data ASN berdasarkan ID
        $asn = $model
        ->join('instansipemohon','instansipemohon.id_instansipemohon=asn.id_instansipemohon','left')
        ->join('golonganpangkat','golonganpangkat.id_golonganpangkat=asn.id_golonganpangkat','left')
        ->find($id);

        if ($asn) {
            return $this->response->setJSON([
                'nip' => $asn['nip'],
                'no_hp' => $asn['no_hp'],
                'alamat' => $asn['alamat'],
                'jabatan' => $asn['jabatan'],
                'gaji_pokok' => $asn['gaji_pokok'],
                'nama_instansipemohon' => $asn['nama_instansipemohon'],
                'nama_golonganpangkat' => $asn['nama_golonganpangkat'],
                'keluarga' => $keluarga,
            ]);
        } else {
            return $this->response->setJSON(['error' => 'ASN not found'])->setStatusCode(404);
        }
    }

    public function update_status_terima($id)
    {

        $id_login=session('id_login');
        $approver = $this->ApproverModel->where('id_login', $id_login)->first();
        // var_dump($approver['id_approver']);exit;

        $data = $this->PermohonanModel
        ->join('asn','asn.id_asn=permohonan.id_asn','left')
        ->join('login','login.id_login=asn.id_login')
        ->find($id);
        $email=$data['username'];
        $nama=$data['gelar_depan'].' '.$data['nama'].(!empty($data['gelar_belakang']) ? ', '.$data['gelar_belakang'] : '');
        
        // var_dump($email);exit;
        if (null !== $this->request->getPost('terima')) {
            
            $this->PermohonanModel->update($id, [
                'status' => 'terima',
                'id_approver'=>$approver['id_approver']
            ]);
        
            $dataPersetujuan = [
                'tanggal_mulai' => $this->request->getPost('tanggal_mulai'),
                'tanggal_berakhir' => $this->request->getPost('tanggal_berakhir'),
                'id_skpd' => $this->request->getPost('id_skpd'), // Assuming id_skpd is sent in the request
                'id_golrum' => $this->request->getPost('id_golrum'), // Assuming id_golrum is sent in the request
                'id_instansipencatatan' => $this->request->getPost('id_instansipencatatan'), // Assuming id_instansipencatatan is sent in the request
                'id_pemohon' => $id, // Using the ID of the pemohon
                
            ];

            // Assuming you have a model for persetujuan
            $this->PersetujuanModel->insert($dataPersetujuan);


            $message = "<h1>Verifikasi Pengajuan</h1>Pengajuan atas nama ".$nama." <b>DITERIMA</b>."."Mohon untuk mengunduh surat permohonan, melengkapi dengan materai, tanda tangan dan foto, lalu menyerahkan surat yang sudah lengkap ke kantor BPKAD bagian Pengamanan & Pemanfaatan Aset (PPA).";
            $this->sendEmail($email, 'Verifikasi Pengajuan', $message);
            return redirect()->to('/pemohon_baru')->with('success', 'Data Permohonan berhasil diterima.');
        }

        if (null !== $this->request->getPost('tolak')) {
            $this->PermohonanModel->update($id, [
                'status' => 'tolak',
            ]);
            $message = "<h1>Verifikasi Pengajuan</h1>Pengajuan atas nama ".$nama." <b>DITOLAK</b>";
            $this->sendEmail($email, 'Verifikasi Pengajuan', $message);
            return redirect()->to('/pemohon_baru')->with('success', 'Data Permohonan berhasil ditolak.');
        }

            
        // return $this->response->setJSON([
        //     'success' => true,
        //     'message' => 'Permohonan berhasil diterima.',
        // ]);
    }

    public function update_status_tolak($id)
    {

        $id_login=session('id_login');
        $approver = $this->ApproverModel->where('id_login', $id_login)->first();
        $this->PermohonanModel->update($id, [
            'status' => 'tolak',
            'id_approver'=>$approver['id_approver']
        ]);
        return redirect()->to('/pemohon_baru')->with('success', 'Data Permohonan berhasil ditolak.');
    }
    public function detail_edit($id)
    {
        $data['permohonan'] = $this->PermohonanModel->find($id);
        if (session('level')=='asn') {
            $id_login=session('id_login');
            $data['asn'] = $this->AsnModel->where('id_login',$id_login)->findAll();
        }else{

            $data['asn'] = $this->AsnModel->findAll();
        }
        $data['alamatrumahdinas'] = $this->AlamatRumahDinasModel->findAll(); // Get all instansi pemohon for the create view

        if (empty($data['permohonan'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Permohonan tidak ditemukan');
        }

        // return view('detail_permohonan_edit', $data);
        echo view('layout/header'); 
        echo view('layout/menu');
        echo view('detail_permohonan_edit', $data);
        echo view('layout/footer');
    }
    public function proses_edit_detail_permohonan($id)
    {
        // Check if nomor_rumah_dinas already exists in permohonan
        $id_asn = $this->request->getPost('id_asn');
        $cekKK = $this->AsnModel->where('id_asn', $id_asn)->first();

        // Cek apakah ada permohonan dari keluarga yang sudah diterima
        $valKK = $this->PermohonanModel
                ->join('asn','asn.id_asn=permohonan.id_asn')
                ->where('permohonan.id_asn', $id_asn)
                ->where('no_kk',$cekKK['no_kk'])
                ->where('status','terima')
                ->first();
        
        // Jika ada permohonan dari keluarga yang sudah diterima
        if ($valKK) {
            // Jika nomor KK sama, berarti dari keluarga yang sama
            if ($cekKK['no_kk']==$valKK['no_kk']) {
                // Cek apakah sudah ada permohonan yang diterima
                if($valKK['status'] == 'terima') {
                    return redirect()->to('/pemohon_baru')->with('error', 'Proses permohonan gagal. Keluarga anda sudah memiliki permohonan yang diterima.');
                }
            }
        }

        // Check if permohonan belongs to current user
        $permohonan = $this->PermohonanModel->find($id);
        if (session('level') == 'asn') {
            $id_login = session('id_login');
            $asn = $this->AsnModel->where('id_login', $id_login)->first();
            if ($permohonan['id_asn'] != $asn['id_asn']) {
                return redirect()->to('/pemohon_baru')->with('error', 'Proses permohonan gagal. Anda tidak memiliki akses untuk mengedit permohonan ini.');
            }
        }

        $nomorRumahDinas = $this->request->getPost('nomor_rumah_dinas');
        $existingPermohonan = $this->PermohonanModel->where('nomor_rumah_dinas', $nomorRumahDinas)->first();

        if ($existingPermohonan && $existingPermohonan['id_pemohon'] != $id) {
            return redirect()->to('/pemohon_baru')->with('error', 'Proses permohonan gagal. Nomor rumah dinas sudah ada di permohonan.');
        }

        // Get existing data
        $existingData = $this->PermohonanModel->find($id);

        // Handle file uploads
        $fileSK = $this->request->getFile('file_sk');
        $fileKTP = $this->request->getFile('file_ktp');
        $fileKK = $this->request->getFile('file_kk');
        $filePasFoto = $this->request->getFile('file_pas_foto');
        $fileFotoRumah = $this->request->getFile('file_foto_rumah');

        // Prepare update data
        $updateData = [
            'id_asn' => $this->request->getPost('id_asn'),
            'bersedia_menaati_peraturan' => $this->request->getPost('bersedia_menaati_peraturan'),
            'id_alamatrumahdinas' => $this->request->getPost('id_alamatrumahdinas'),
            'nomor_rumah_dinas' => $this->request->getPost('nomor_rumah_dinas'),
            'rumah_ditempati' => $this->request->getPost('rumah_ditempati'),
            'tanggal_ditempati' => $this->request->getPost('tanggal_ditempati'),
            'keterangan' => $this->request->getPost('keterangan'),
            'status' => 'tunggu'
        ];

        // Only update file fields if new files are uploaded
        if ($fileSK && $fileSK->isValid() && !$fileSK->hasMoved()) {
            $updateData['file_sk'] = base64_encode(file_get_contents($fileSK->getTempName()));
        }
        if ($fileKTP && $fileKTP->isValid() && !$fileKTP->hasMoved()) {
            $updateData['file_ktp'] = base64_encode(file_get_contents($fileKTP->getTempName()));
        }
        if ($fileKK && $fileKK->isValid() && !$fileKK->hasMoved()) {
            $updateData['file_kk'] = base64_encode(file_get_contents($fileKK->getTempName()));
        }
        if ($filePasFoto && $filePasFoto->isValid() && !$filePasFoto->hasMoved()) {
            $updateData['file_pas_foto'] = base64_encode(file_get_contents($filePasFoto->getTempName()));
        }
        if ($fileFotoRumah && $fileFotoRumah->isValid() && !$fileFotoRumah->hasMoved()) {
            $updateData['file_foto_rumah'] = base64_encode(file_get_contents($fileFotoRumah->getTempName()));
        }

        // Update the record
        $this->PermohonanModel->update($id, $updateData);

        return redirect()->to('/pemohon_baru')->with('success', 'Data Permohonan berhasil diperbarui.');
    }
}
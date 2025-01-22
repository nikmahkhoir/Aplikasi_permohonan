<?php

namespace App\Controllers;

use App\Models\PersetujuanModel;
use App\Models\SkpdModel;
use App\Models\GolonganRumahDinasModel;
use App\Models\InstansiPencatatanModel;
use App\Models\KeluargaModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet; // Ensure this line is correct
use PhpOffice\PhpSpreadsheet\Writer\Xlsx; // Ensure this line is correct
use CodeIgniter\Controller;

class PersetujuanController extends Controller
{
    protected $PersetujuanModel;
    protected $SkpdModel;
    protected $GolonganRumahDinasModel;
    protected $InstansiPencatatanModel;
    protected $KeluargaModel;

    public function __construct()
    {
        // Inisialisasi model
        $this->PersetujuanModel = new PersetujuanModel();
        $this->SkpdModel = new SkpdModel();
        $this->GolonganRumahDinasModel = new GolonganRumahDinasModel();
        $this->InstansiPencatatanModel = new InstansiPencatatanModel();
        $this->KeluargaModel = new KeluargaModel();
    }

    public function index()
    {
        // Ambil semua data persetujuan
        if (session('level')=='asn') {
        $data['persetujuan'] = $this->PersetujuanModel
        ->join('golonganrumahdinas','golonganrumahdinas.id_golrum=persetujuan.id_golrum','left')
        ->join('instansipencatatan','instansipencatatan.id_instansipencatatan=persetujuan.id_instansipencatatan','left')
        ->join('skpd','skpd.id_skpd=persetujuan.id_skpd','left')
        ->join('permohonan','permohonan.id_pemohon=persetujuan.id_pemohon','left')
        ->join('asn','asn.id_asn=permohonan.id_asn')
        ->where('id_login',session('id_login'))
        ->findAll();
        }
        else{
            $data['persetujuan'] = $this->PersetujuanModel
        ->join('golonganrumahdinas','golonganrumahdinas.id_golrum=persetujuan.id_golrum','left')
        ->join('instansipencatatan','instansipencatatan.id_instansipencatatan=persetujuan.id_instansipencatatan','left')
        ->join('skpd','skpd.id_skpd=persetujuan.id_skpd','left')
        ->join('permohonan','permohonan.id_pemohon=persetujuan.id_pemohon','left')
        ->join('asn','asn.id_asn=permohonan.id_asn')
        ->findAll();
        }

        // var_dump($data);exit;

        // Kirim data ke view
        return view('layout/header')
            . view('layout/menu')
            . view('data-persetujuan', $data)
            . view('layout/footer');
    }

    public function create()
    {
        // Ambil data SKPD dan golongan rumah dinas
        $data['skpd'] = $this->SkpdModel->findAll();
        $data['golonganrumahdinas'] = $this->GolonganRumahDinasModel->findAll();
        $data['instansipencatatan'] = $this->InstansiPencatatanModel->findAll();
        // var_dump($data['golonganrumahdinas']);exit;
        // Kirim data ke view
        return view('layout/header') 
            . view('layout/menu')
            . view('input-persetujuan', $data)
            . view('layout/footer');
    }

    public function store()
    {
        $this->PersetujuanModel->save([
            'tanggal_mulai' => $this->request->getPost('tanggal_mulai'),
            'tanggal_berakhir' => $this->request->getPost('tanggal_berakhir'),
            'id_skpd' => $this->request->getPost('skpd'),
            'id_golrum' => $this->request->getPost('golongan_rumah'),
            'id_instansipencatatan' => $this->request->getPost('instansipencatatan'),
        ]);
        
        return redirect()->to('/persetujuan')->with('success', 'Data PERSETUJUAN berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Ambil data persetujuan berdasarkan ID
        $data['persetujuan'] = $this->PersetujuanModel->find($id);
    
        // Pastikan data persetujuan ditemukan
        if (!$data['persetujuan']) {
            return redirect()->to('/persetujuan')->with('error', 'Data tidak ditemukan.');
        }
    
        // Ambil semua data SKPD
        $data['skpd'] = $this->SkpdModel->findAll();
    
        // Ambil semua data Golongan Rumah Dinas
        $data['golonganrumahdinas'] = $this->GolonganRumahDinasModel->findAll();

        $data['instansipencatatan'] = $this->InstansiPencatatanModel->findAll();
    
        // Load view dengan data yang sudah lengkap
        echo view('layout/header'); 
        echo view('layout/menu');
        echo view('edit-persetujuan', $data);
        echo view('layout/footer');
    }
    
    public function update($id)
    {
        $this->PersetujuanModel->update($id, [
            'tanggal_mulai' => $this->request->getPost('tanggal_mulai'),
            'tanggal_berakhir' => $this->request->getPost('tanggal_berakhir'),
            'id_skpd' => $this->request->getPost('skpd'),
            'id_golrum' => $this->request->getPost('golongan_rumah'),
            'id_instansipencatatan' => $this->request->getPost('instansipencatatan'),
        ]);

        return redirect()->to('/persetujuan')->with('success', 'Data PERSETUJUAN berhasil diupdate.');
    }

    public function delete($id)
    {
        $this->PersetujuanModel->delete($id);
        return redirect()->to('/persetujuan')->with('success', 'Data PERSETUJUAN berhasil dihapus.');
    }

    public function cetak($id)
    {
        $data['persetujuan'] = $this->PersetujuanModel
        ->select('asn.*, approver.nip as nip_app, approver.nama as nama_app,nama_golonganpangkat,kop_skpd,nama_alamatrumahdinas,biaya_sewa,nomor_rumah_dinas,nama_instansipemohon,golongan_rumah,kepala_skpd, nip_kepala_skpd,jabatan,tanggal_ditempati,tanggal_mulai, tanggal_berakhir')
        ->join('golonganrumahdinas','persetujuan.id_golrum=golonganrumahdinas.id_golrum','left')
        ->join('skpd','skpd.id_skpd=persetujuan.id_skpd','left')
        ->join('permohonan','permohonan.id_pemohon=persetujuan.id_pemohon','left')
        ->join('asn','asn.id_asn=permohonan.id_asn','left')
        ->join('instansipemohon','instansipemohon.id_instansipemohon=asn.id_instansipemohon','left')
        ->join('golonganpangkat','golonganpangkat.id_golonganpangkat=asn.id_golonganpangkat','left')
        ->join('approver','approver.id_approver=permohonan.id_approver','left')
        ->join('alamatrumahdinas','alamatrumahdinas.id_alamatrumahdinas=permohonan.id_alamatrumahdinas','left')
        ->where('id_persetujuan',$id)
        ->first();
        // var_dump($data['persetujuan']);exit;
        $id_asn = $data['persetujuan']['id_asn'];
        $data['keluarga'] = $this->KeluargaModel->where('id_asn', $id_asn)->findAll();
        $data['jumlah_keluarga'] = count($data['keluarga']);
        return view('cetak', $data);
    }

    public function exportExcel() // New method for exporting to Excel
    {
        $tanggal_dari = $this->request->getPost('tanggal_dari');
        $tanggal_sampai = $this->request->getPost('tanggal_sampai');

        // $data['persetujuan'] = $this->PersetujuanModel->findAll(); // Fetch all data
        $data['persetujuan'] = $this->PersetujuanModel
        ->select('asn.*, approver.nip as nip_app, approver.nama as nama_app,nama_golonganpangkat,kop_skpd,nama_alamatrumahdinas,biaya_sewa,nomor_rumah_dinas,nama_instansipemohon,golongan_rumah,kepala_skpd, nip_kepala_skpd,jabatan,tanggal_ditempati,tanggal_mulai, tanggal_berakhir')
        ->join('golonganrumahdinas','persetujuan.id_golrum=golonganrumahdinas.id_golrum','left')
        ->join('skpd','skpd.id_skpd=persetujuan.id_skpd','left')
        ->join('permohonan','permohonan.id_pemohon=persetujuan.id_pemohon','left')
        ->join('asn','asn.id_asn=permohonan.id_asn')
        ->join('instansipemohon','instansipemohon.id_instansipemohon=asn.id_instansipemohon','left')
        ->join('golonganpangkat','golonganpangkat.id_golonganpangkat=asn.id_golonganpangkat','left')
        ->join('approver','approver.id_approver=permohonan.id_approver','left')
        ->join('alamatrumahdinas','alamatrumahdinas.id_alamatrumahdinas=permohonan.id_alamatrumahdinas','left')
        ->where('tanggal_mulai >=', $tanggal_dari)
        ->where('tanggal_mulai <=', $tanggal_sampai)
        // ->where('id_persetujuan',$id)
        ->findAll();
// var_dump($data['persetujuan']);exit;
        $spreadsheet = new Spreadsheet(); // Create new Spreadsheet object
        $sheet = $spreadsheet->getActiveSheet(); // Get active sheet

        // Set header values
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama Pemohon');
        $sheet->setCellValue('C1', 'NIP');
        $sheet->setCellValue('D1', 'NO KTP');
        $sheet->setCellValue('E1', 'NO KK');
        $sheet->setCellValue('F1', 'Golongan Pangkat');
        $sheet->setCellValue('G1', 'Jabatan');
        $sheet->setCellValue('H1', 'Instansi Pemohon');
        $sheet->setCellValue('I1', 'Gaji Pokok');
        $sheet->setCellValue('J1', 'NO HP');
        $sheet->setCellValue('K1', 'Alamat Pemohon');
        $sheet->setCellValue('L1', 'Golongan Rumah Dinas');
        $sheet->setCellValue('M1', 'Biaya Rumah Dinas');
        $sheet->setCellValue('N1', 'Nomor Rumah Dinas');
        $sheet->setCellValue('O1', 'Alamat Rumah Dinas');
        $sheet->setCellValue('P1', 'Tanggal Mulai');
        $sheet->setCellValue('Q1', 'Tanggal Berakhir');
        $sheet->setCellValue('R1', 'Kop SKPD');
        $sheet->setCellValue('S1', 'Kepala SKPD');
        $sheet->setCellValue('T1', 'Nip Kepala SKPD');
        $sheet->setCellValue('U1', 'Suami');
        $sheet->setCellValue('V1', 'Istri');
        $sheet->setCellValue('W1', 'Anak');


        // Populate data
        $row = 2; // Start from the second row
        $no=1;
        foreach ($data['persetujuan'] as $persetujuan) {
            $id_asn=$persetujuan['id_asn'];
            $data['keluarga'] = $this->KeluargaModel->where('id_asn', $id_asn)->findAll();
            $data['istri'] = [];
            $data['anak'] = [];
            $data['suami'] = [];
            foreach ($data['keluarga'] as $anggota) {
                if (strtolower($anggota['posisi']) === 'istri') {
                    $data['istri'] = $anggota; // Simpan data istri
                }
                if (strtolower($anggota['posisi']) === 'anak') {
                    $data['anak'][] = $anggota; // Simpan data anak
                }
                if (strtolower($anggota['posisi']) === 'suami') {
                    $data['suami'] = $anggota; // Simpan data anak
                }
            }
            // var_dump($data);exit;
            $data['jumlah_keluarga'] = count($data['keluarga']);
            $sheet->setCellValue('A' . $row, $no++);
            $sheet->setCellValue('B' . $row, $persetujuan['gelar_depan'].' '.$persetujuan['nama'].(!empty($persetujuan['gelar_belakang']) ? ', '.$persetujuan['gelar_belakang'] : ''));
            $sheet->setCellValue('C' . $row, "'".$persetujuan['nip']);
            $sheet->setCellValue('D' . $row, "'".$persetujuan['no_ktp']);
            $sheet->setCellValue('E' . $row, "'".$persetujuan['no_kk']);
            $sheet->setCellValue('F' . $row, $persetujuan['nama_golonganpangkat']);
            $sheet->setCellValue('G' . $row, $persetujuan['jabatan']);
            $sheet->setCellValue('H' . $row, $persetujuan['nama_instansipemohon']);
            $sheet->setCellValue('I' . $row, $persetujuan['gaji_pokok']);
            $sheet->setCellValue('J' . $row, $persetujuan['no_hp']);
            $sheet->setCellValue('K' . $row, $persetujuan['alamat']);
            $sheet->setCellValue('L' . $row, $persetujuan['golongan_rumah']);
            $sheet->setCellValue('M' . $row, "'".$persetujuan['biaya_sewa']);
            $sheet->setCellValue('N' . $row, "'".$persetujuan['nomor_rumah_dinas']);
            $sheet->setCellValue('O' . $row, $persetujuan['nama_alamatrumahdinas']);
            $sheet->setCellValue('P' . $row, $persetujuan['tanggal_mulai']);
            $sheet->setCellValue('Q' . $row, $persetujuan['tanggal_berakhir']);
            $sheet->setCellValue('R' . $row, $persetujuan['kop_skpd']);
            $sheet->setCellValue('S' . $row, $persetujuan['kepala_skpd']);
            $sheet->setCellValue('T' . $row,"'". $persetujuan['nip_kepala_skpd']);
            $sheet->setCellValue('U' . $row, !empty($data['suami']) 
            ? $data['suami']['nama'] . (isset($data['suami']['usia']) ? ' (' . $data['suami']['usia'] . ' tahun)' : '') 
            : '');

        $sheet->setCellValue('V' . $row, !empty($data['istri']) 
            ? $data['istri']['nama'] . (isset($data['istri']['usia']) ? ' (' . $data['istri']['usia'] . ' tahun)' : '') 
            : '');
        
            $sheet->setCellValue('W' . $row, !empty($data['anak']) ? implode(', ', array_map(function($anak) {
                return $anak['nama'] . ' (' . $anak['usia'] . ' tahun)';
            }, $data['anak'])) : '');
            $row++;
        }

        $writer = new Xlsx($spreadsheet); // Create Xlsx writer
        $filename = 'data_persetujuan.xlsx'; // Set filename

        // Set headers for download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output'); // Output to browser
        exit; // Exit to prevent further output
    }
}
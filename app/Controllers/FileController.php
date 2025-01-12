<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\FileModel;

class FileController extends Controller
{
    public function downloadSK($id)
    {
        $model = new FileModel();
        $fileData = $model->getFileById($id, 'file_sk');
    
        if ($fileData && !empty($fileData['data'])) {
            return $this->response
                ->setHeader('Content-Type',$fileData['data'])
                ->setHeader('Content-Disposition', 'attachment; filename="SK_' . $id . '.pdf"')
                ->setBody($fileData['data']);
        }
    
        return redirect()->back()->with('error', 'File SK tidak ditemukan.');
    }
    
    public function downloadKTP($id)
    {
        $model = new FileModel();
        $fileData = $model->getFileById($id, 'file_ktp');

        if ($fileData && !empty($fileData['data'])) {
            return $this->response
                ->setHeader('Content-Type', $fileData['mime_type'])
                ->setHeader('Content-Disposition', 'attachment; filename="KTP_' . $id . '.png"')
                ->setBody($fileData['data']);
        }

        return redirect()->back()->with('error', 'File KTP tidak ditemukan.');
    }

    public function downloadKK($id)
    {
        $model = new FileModel();
        $fileData = $model->getFileById($id, 'file_kk');

        if ($fileData && !empty($fileData['data'])) {
            return $this->response
                ->setHeader('Content-Type', $fileData['mime_type'])
                ->setHeader('Content-Disposition', 'attachment; filename="KK_' . $id . '.pdf"')
                ->setBody($fileData['data']);
        }

        return redirect()->back()->with('error', 'File KK tidak ditemukan.');
    }

    public function downloadPasFoto($id)
    {
        $model = new FileModel();
        $fileData = $model->getFileById($id, 'file_pas_foto');

        if ($fileData && !empty($fileData['data'])) {
            return $this->response
                ->setHeader('Content-Type', $fileData['mime_type'])
                ->setHeader('Content-Disposition', 'attachment; filename="PasFoto_' . $id . '.jpg"')
                ->setBody($fileData['data']);
        }

        return redirect()->back()->with('error', 'File Pas Foto tidak ditemukan.');
    }

    public function downloadFotoRumah($id)
    {
        $model = new FileModel();
        $fileData = $model->getFileById($id, 'file_foto_rumah');

        if ($fileData && !empty($fileData['data'])) {
            return $this->response
                ->setHeader('Content-Type', $fileData['mime_type'])
                ->setHeader('Content-Disposition', 'attachment; filename="FotoRumah_' . $id . '.jpg"')
                ->setBody($fileData['data']);
        }

        return redirect()->back()->with('error', 'File Foto Rumah tidak ditemukan.');
    }
}

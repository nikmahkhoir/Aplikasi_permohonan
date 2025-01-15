<?php
// ob_start();

// Start Generation Here
function terbilang($number) {
    // Konversi ke integer untuk memastikan input adalah angka
    $number = intval($number);

    $huruf = array(
        '', 'Satu', 'Dua', 'Tiga', 'Empat', 'Lima', 'Enam', 'Tujuh', 'Delapan', 'Sembilan',
        'Sepuluh', 'Sebelas', 'Dua Belas', 'Tiga Belas', 'Empat Belas', 'Lima Belas', 'Enam Belas',
        'Tujuh Belas', 'Delapan Belas', 'Sembilan Belas', 'Dua Puluh', 'Tiga Puluh', 'Empat Puluh',
        'Lima Puluh', 'Enam Puluh', 'Tujuh Puluh', 'Delapan Puluh', 'Sembilan Puluh', 'Seratus'
    );

    if ($number < 0) {
        return 'Minus ' . terbilang(-$number);
    } elseif ($number < 21) {
        return $huruf[$number];
    } elseif ($number < 100) {
        return $huruf[floor($number / 10) * 10] . ' ' . terbilang($number % 10);
    } elseif ($number < 200) {
        return 'Seratus ' . terbilang($number - 100);
    } elseif ($number < 1000) {
        return $huruf[floor($number / 100)] . ' Ratus ' . terbilang($number % 100);
    } elseif ($number < 2000) {
        return 'Seribu ' . terbilang($number - 1000);
    } elseif ($number < 1000000) {
        // Memisahkan ribuan dengan lebih cermat
        $ribuan = floor($number / 1000);
        $sisa = $number % 1000;

        // Jika sisa adalah 0, hanya sebutkan "Ribu"
        if ($sisa == 0) {
            return terbilang($ribuan) . ' Ribu';
        } else {
            return terbilang($ribuan) . ' Ribu ' . terbilang($sisa);
        }
    } elseif ($number < 1000000000) {
        return terbilang(floor($number / 1000000)) . ' Juta ' . terbilang($number % 1000000);
    }
}



function tanggalIndo($date) {
    $bulan = array(
        1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
        5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
        9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
    );

    $tanggal = date('j', strtotime($date));
    $bulanIndex = date('n', strtotime($date));
    $tahun = date('Y', strtotime($date));

    return $tanggal . ' ' . $bulan[$bulanIndex] . ' ' . $tahun;
}

$hari = date("l", strtotime($persetujuan['tanggal_mulai']));
// $hari = date('l');
//2024-01-14
if ($hari == 'Sunday') {
    $hari_tampil = 'Minggu';
} elseif ($hari == 'Monday') {
    $hari_tampil = 'Senin';
} elseif ($hari == 'Tuesday') {
    $hari_tampil = 'Selasa';
} elseif ($hari == 'Wednesday') {
    $hari_tampil = 'Rabu';
} elseif ($hari == 'Thursday') {
    $hari_tampil = 'Kamis';
} elseif ($hari == 'Friday') {
    $hari_tampil = 'Jumat';
} elseif ($hari == 'Saturday') {
    $hari_tampil = 'Sabtu';
}


require_once APPPATH . 'ThirdParty/FPDF/fpdf.php';

    // Create instance of FPDF
    $pdf = new FPDF();
    // $pdf->AddPage();
    $pdf->SetMargins(10, 10, 10); // Set margins
    $pdf->SetAutoPageBreak(true, 10); // Enable auto page break
    $pdf->AddPage('P', 'A4'); // Add a page in portrait orientation A4
    $pdf->SetFont('Arial', 'B', 16);
    
    // Add a title
    $pdf->Cell(0, 10, 'KETENTUAN PENGHUNIAN RUMAH NEGARA', 0, 1, 'C');
    $pdf->Ln(10); // New line
    $pdf->SetFont('Arial', '', 10);
 
    $pdf->MultiCell(0, 6, "1. Surat Izin Penghunian Rumah Negara Golongan ".$persetujuan['golongan_rumah']." ini hanya berlaku selama pemegangnya (yang berhak) bekerja\n".
                          "    di lingkungan Pemerintah Kabupaten Tanah Laut.\n" .
                            "2. Pemegang Surat Izin Penghunian Rumah Negara, ini harus mengosongkan Rumah tersebut dan menyerahkan\n".
                            "    Rumah dalam keadaan lengkap kepada pejabat yang ditunjuk dalam waktu :\n" .
                            "   1) paling lambat 1 (satu) bulan terhitung sejak saat meninggal dunia, bagi penghuni yang meninggal dunia;\n" .
                            "   2) paling lambat 1 (satu) bulan terhitung sejak keputusan pemberhentian, bagi penghuni yang berhenti atas kemauan\n".
                            "       sendiri atau yang dikenakan hukuman disiplin pemberhentian;\n" .
                            "   3) paling lambat 2 (dua) minggu terhitung sejak saat terbukti adanya pelanggaran, bagi penghuni yang melanggar\n".
                            "       larangan penghunian rumah negara yang dihuninya;\n" .
                            "3. Dilarang memindahkan hak Surat Izin Penghunian Dinas ini atau menyewakan/mengontrakan sebagian atau seluruh\n".
                            "    bangunan Rumah Negara.\n" .
                            "4. Dilarang mengubah atau menambah bangunan Rumah tanpa izin (dari pejabat yang ditunjuk).\n" .
                            "5. Dilarang menggunakan sebagian atau seluruh untuk keperluan lain diluar yang telah ditentukan.\n" .
                            "6. Pemegang Surat Izin Penghunian Rumah Negara wajib memelihara sebaik-baiknya Rumah Negara tersebut.\n" .
                            "7. Pemegang Surat Izin Penghunian Rumah Negara wajib membayar sewa/retribusi Rumah Negara.\n" .
                            "8. Penghuni membayar pajak-pajak, retribusi dan lain-lain yang berkaitan dengan penghunian Rumah Negara dan\n".
                            "    membayar biaya pemakaian daya listrik, telepon, air dan/atau gas.\n" .
                            "9. Pemegang Surat Izin Rumah Negara bertanggung jawab atas segala biaya untuk memperbaiki kerusakan yang\n".
                            "    terjadi sebagai akibat kesalahan/kelalaiannya.\n" .
                            "10. Setelah dikeluarkan Surat Izin Penghunian Rumah Negara, Rumah Negara tersebut harus sudah ditempati oleh\n".
                            "     yang berhak.\n" .
                            "11. Pelanggaran terhadap ketentuan-ketentuan dimaksud diatas dapat berakibat dibatalkannya Surat Izin Penghunian\n".
                            "     Rumah Negara.\n" .
                            "12. Masa berlakunya Izin Penghunian Rumah Negara Golongan ".$persetujuan['golongan_rumah']." adalah 2 (dua) tahun dan dapat\n".
                            "     diperpanjang/dicabut setelah dilakukan evaluasi.\n" .
                            "13. Surat Izin Penghunian ini mulai berlaku pada tanggal ditetapkannya dengan ketentuan bahwa jika dikemudian hari\n".
                            "     ternyata ada kekeliruan, maka Surat Izin Penghunian ini dapat akan diperbaiki sebagaimana mestinya.\n\n" .
                            "Telah membaca dan sanggup mentaati\n" .
                            "Ketentuan-ketentuan termaksud diatas",'J');

    $pdf->Ln(10); // New line
    // $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(100, 6, 'Pemegang Surat Izin Penghunian,', 0, 0, 'C');
    $pdf->Cell(0, 6, 'Sekretaris Daerah', 0, 1, 'C');
    $pdf->Cell(100, 6, ',', 0, 0, 'C');
    $pdf->Cell(0, 6, 'Kabupaten Tanah Laut', 0, 1, 'C');
    $pdf->Ln(20);
    $pdf->SetFont('Arial', 'BU', 10);
    $pdf->Cell(100, 6, $persetujuan['gelar_depan'].'. '.$persetujuan['nama'].', '.$persetujuan['gelar_belakang'], 0, 0,'C');
    // $pdf->Cell(0, 6, $persetujuan['nama_app'], 0, 1, 'C');
    $pdf->Cell(0, 6, $persetujuan['kepala_skpd'], 0, 1, 'C');
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(100, 6, 'NIP. '.$persetujuan['nip'], 0, 0, 'C');
    // $pdf->Cell(0, 6, 'NIP. '.$persetujuan['nip_app'], 0, 1, 'C');
    $pdf->Cell(0, 6, 'NIP. '.$persetujuan['nip_kepala_skpd'], 0, 1, 'C');

    // Fetch data to print
    // $data = $this->AsnModel->findAll(); // Fetch all ASN data

    // // Print data
    // foreach ($data as $row) {
    //     $pdf->Cell(0, 10, 'Nama: ' . $row['nama'], 0, 1);
    //     $pdf->Cell(0, 10, 'NIP: ' . $row['nip'], 0, 1);
    //     $pdf->Ln(5); // New line
    // }
    $pdf->AddPage('P', 'A4'); // Add a page in portrait orientation A4
    $pdf->SetFont('Arial', 'B', 16);
    $imagePath = FCPATH . 'tala.jpg'; // Use FCPATH to ensure the correct path
    // if (file_exists($imagePath)) {
        $pdf->Image($imagePath, 10, 10, 20); 
    $pdf->Cell(0, 10, 'PEMERINTAH KABUPATEN TANAH LAUT', 0, 1, 'C');
    $pdf->Cell(0, 10, 'SEKRETARIAT DAERAH', 0, 1, 'C');
    $pdf->SetFont('Arial', '', 9);
    $pdf->Cell(0, 5, 'Jl. A. Syairani Komplek Perkantoran Gagas Pelaihari 70814 Telp (0512 ) 21103', 0, 1, 'C');
    $pdf->SetLineWidth(0.1); // Set the line width
    $pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY()); // Draw a horizontal line
    $pdf->Ln(1);
    $pdf->SetLineWidth(0.1); // Set the line width
    $pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY()); // Draw a horizontal line
    $pdf->Ln(5); // New line

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(50, 6, 'No. Rumah Negara', 0, 0);
$pdf->Cell(0, 6, ': '.$persetujuan['nomor_rumah_dinas'], 0, 1);
$pdf->Cell(50, 6, 'Letak', 0, 0);
$pdf->Cell(0, 6, ': '.$persetujuan['nama_alamatrumahdinas'], 0, 1);
$pdf->Cell(50, 6, 'Golongan', 0, 0);
$pdf->Cell(0, 6, ': Golongan '.$persetujuan['golongan_rumah'], 0, 1);
$pdf->Cell(50, 6, 'Sewa/Retribusi per bulan', 0, 0);
$pdf->Cell(0, 6, ': '.$persetujuan['biaya_sewa'], 0, 1);
$pdf->Ln(5); // New line for spacing

$pdf->SetFont('Arial', 'BU', 14);
$pdf->Cell(0, 10, 'SURAT IZIN PENGHUNIAN', 0, 1, 'C');
$pdf->Ln(5); // New line

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(50, 6, 'Diberikan kepada', 0, 0);
$pdf->Cell(0, 6, ': '.$persetujuan['gelar_depan'].' '.$persetujuan['nama'].', '.$persetujuan['gelar_belakang'], 0, 1);
$pdf->Cell(50, 6, 'Pangkat', 0, 0);
$pdf->Cell(0, 6, ': '.$persetujuan['nama_golonganpangkat'], 0, 1);
$pdf->Cell(50, 6, 'NIP', 0, 0);
$pdf->Cell(0, 6, ': '.$persetujuan['nip'], 0, 1);
$pdf->Cell(50, 6, 'SKPD/Instansi', 0, 0);
$pdf->Cell(0, 6, ': '.$persetujuan['nama_instansipemohon'], 0, 1);
$pdf->Cell(50, 6, 'Gaji Pokok', 0, 0);
$pdf->Cell(0, 6, ': '.$persetujuan['gaji_pokok'], 0, 1);
$pdf->Cell(50, 6, 'Tempat Tinggal', 0, 0);
$pdf->Cell(0, 6, ': '.$persetujuan['alamat'], 0, 1);
$pdf->Cell(50, 6, 'Jumlah Keluarga', 0, 0);
$pdf->Cell(0, 6, ': '.$jumlah_keluarga.' ('.terbilang($jumlah_keluarga).') orang, terdiri dari:', 0, 1);
$pdf->Ln(5);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(10, 10, 'No.', 1);
$pdf->Cell(70, 10, 'Nama Anggota Keluarga', 1);
$pdf->Cell(25, 10, 'L/P', 1);
$pdf->Cell(25, 10, 'Usia Th.', 1);
$pdf->Cell(35, 10, 'Hu.Kel.Is/Su/A', 1);
$pdf->Ln();

$pdf->SetFont('Arial', '', 10);
$no=1;
if ($keluarga) {
    # code...
    foreach ($keluarga as $row) {
        $pdf->Cell(10, 10, $no++, 1);
        $pdf->Cell(70, 10, $row['nama'], 1);
        $pdf->Cell(25, 10, $row['jenis_kelamin'], 1);
        $pdf->Cell(25, 10, $row['usia'], 1);
        $pdf->Cell(35, 10, $row['posisi'], 1);
        $pdf->Ln();
    }
}else{
    $pdf->Cell(10, 10, "-", 1);
    $pdf->Cell(70, 10, "-", 1);
    $pdf->Cell(25, 10, "-", 1);
    $pdf->Cell(25, 10, "-", 1);
    $pdf->Cell(35, 10, "-", 1);
    $pdf->Ln();
}

$pdf->Ln(5);
$pdf->Cell(69, 6, 'Untuk menempati rumah', 0, 0);

$pdf->MultiCell(0, 6, ': No. Rumah Negara '.$persetujuan['nomor_rumah_dinas'].' di '.$persetujuan['nama_alamatrumahdinas'], 0, 1);
$pdf->Cell(69, 6, 'Berdasarkan surat', 0, 0);
$pdf->MultiCell(0, 6, ': SK. Sekretaris Daerah Kab. Tanah Laut tentang Penunjukkan Penghunian    Rumah Negara');
$pdf->Cell(69, 6, 'Surat Izin Penghunian ini berlaku mulai', 0, 0);
$pdf->Cell(0, 6, ': Sejak diterbitkannya SIP ini.', 0, 1);
$pdf->Cell(69, 6, 'Keterangan', 0, 0);
$pdf->Cell(0, 6, ':-', 0, 1);

$pdf->SetFont('Arial', '', 8);
$pdf->Ln(5);
$pdf->Cell(15, 20, "Pas \n Foto", 1, 1);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(10, 6,'', 0, 0);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 6,'('.$persetujuan['gelar_depan'].'. '.$persetujuan['nama'].', '.$persetujuan['gelar_belakang'].')', 0, 1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(100, 6, "Tanda tangan pemegang Surat Izin Penghunian", 0, 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 6, "Pelaihari,", 0, 1);
$pdf->Cell(100, 6, "", 0, 0);
$pdf->Cell(0, 6, $persetujuan['kop_skpd'].' Kab. Tanah Laut', 0, 1);

$pdf->SetFont('Arial', 'U', 12);
$pdf->Cell(100, 6, "CATATAN", 0, 1);

$pdf->SetFont('Arial', '', 8);
$pdf->Cell(100, 4, "1.	Rumah Negara tersebut dihuni oleh Pemegang SIP", 0, 1);
$pdf->MultiCell(100, 4, "2.	Yang bersangkutan diwajibkan memelihara rumah
     Dinas tersebut, atas penambahan harus dapat izin
     Dari Pejabat yang ditunjuk");
$pdf->Cell(100, 4, "3.	Jika dikemudian hari ternyata ada kekeliruan, maka", 0, 0);
$pdf->SetFont('Arial', 'BU', 10);
$pdf->Cell(0, 4, $persetujuan['kepala_skpd'], 0, 1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(100, 4, "     Surat izin penghunian ini dapat di cabut atau diubah", 0, 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 4,'NIP. '. $persetujuan['nip_kepala_skpd'], 0, 1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(100, 4, "     Sebagaimana mestinya.", 0, 0);


$pdf->AddPage('P', 'A4'); // Add a page in portrait orientation A4
    $pdf->SetFont('Arial', 'B', 16);
    $imagePath = FCPATH . 'tala.jpg'; // Use FCPATH to ensure the correct path
    // if (file_exists($imagePath)) {
        $pdf->Image($imagePath, 10, 10, 20); 
    $pdf->Cell(0, 10, 'PEMERINTAH KABUPATEN TANAH LAUT', 0, 1, 'C');
    $pdf->Cell(0, 10, 'SEKRETARIAT DAERAH', 0, 1, 'C');
    $pdf->SetFont('Arial', '', 9);
    $pdf->Cell(0, 5, 'Jl. A. Syairani Komplek Perkantoran Gagas Pelaihari 70814 Telp (0512 ) 21103', 0, 1, 'C');
    $pdf->SetLineWidth(0.1); // Set the line width
    $pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY()); // Draw a horizontal line
    $pdf->Ln(1);
    $pdf->SetLineWidth(0.1); // Set the line width
    $pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY()); // Draw a horizontal line
    $pdf->Ln(5); // New line

    $pdf->SetFont('Arial', 'BU', 12);
    $pdf->Cell(0, 6, 'SURAT PERJANJIAN PENGHUNIAN RUMAH NEGARA', 0, 1, 'C');

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(0, 6, 'Nomor: ', 0, 1, 'C');

    $pdf->Cell(15, 6, '', 0, 0);
    $pdf->MultiCell(0, 6, 'Pada Hari ini ' . $hari_tampil.' tanggal '.terbilang(substr($persetujuan['tanggal_mulai'],8,2)).' bulan '.terbilang(substr($persetujuan['tanggal_mulai'],5,2)).' tahun '.terbilang(substr($persetujuan['tanggal_mulai'],0,4)).' masing-masing dibawah ini :');

    $pdf->Ln(3); // New line
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(0, 6, 'Sekretaris Daerah', 0, 1, 'C');
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(120, 6, 'Kabupaten Tanah Laut yang selanjutnya disebut', 0, 0, 'R');
    $pdf->SetFont('Arial', 'BU', 10);
    $pdf->Cell(100, 6, ' PIHAK KESATU', 0, 1, 'L');
   
    $pdf->Ln(3); // New line
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(0, 6, 'dan', 0, 1, 'C');

    $pdf->Ln(3); // New line
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(0, 6, $persetujuan['jabatan'].' pada '.$persetujuan['nama_instansipemohon'], 0, 1, 'C');
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(120, 6, 'Kabupaten Tanah Laut yang selanjutnya disebut', 0, 0, 'R');
    $pdf->SetFont('Arial', 'BU', 10);
    $pdf->Cell(100, 6, ' PIHAK KEDUA', 0, 1, 'L');
    $pdf->Ln(3); // New line

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(15, 6, '', 0, 0);
    $pdf->MultiCell(0, 6, 'Kedua belah pihak telah sepakat membuat Perjanjian Penghunian Rumah Negara berlokasi di '.$persetujuan['nama_alamatrumahdinas'].' Kabupaten Tanah Laut.');
    // $pdf->Ln(3); // New line

    $pdf->Cell(15, 6, '', 0, 0);
    $pdf->MultiCell(0, 6, 'Perjanjian Penghunian Rumah Negara sebagaimana tersebut di atas disepakati dengan ketentuan sebagai berikut :');
    // $pdf->Ln(3); // New line
    $pdf->Cell(15, 6, '', 0, 0);
    $pdf->MultiCell(0, 6, '1. Jangka waktu Penghunian Rumah Negara terhitung sejak tanggal '.tanggalIndo($persetujuan['tanggal_mulai']).' sampai dengan
    '.tanggalIndo($persetujuan['tanggal_berakhir']));
    // $pdf->Ln(3); // New line

    $pdf->Cell(15, 6, '', 0, 0);
    $pdf->MultiCell(0, 6, '2. Setelah jangka waktu Penghunian Rumah Negara berakhir, PIHAK KEDUA dapat mengajukan permohonan
    untuk memperpanjang waktu Penghunian Rumah Negara tersebut kepada PIHAK KESATU, dan apabila
    PIHAK KEDUA tidak bermaksud untuk memperpanjang kembali, maka PIHAK KEDUA wajib
    mengembalikan Rumah Negara dimaksud kepada PIHAK KESATU dalam keadaan baik dan lengkap.');
    // $pdf->Ln(3); // New line

    $pdf->Cell(15, 6, '', 0, 0);
    $pdf->MultiCell(0, 6, '3. Setelah jangka waktu Penghunian Rumah Negara berakhir dan PIHAK KEDUA tidak mengembalikan
    Rumah Negara yang telah ditempati, maka PIHAK KESATU berhak sepenuhnya mengambil alih
    Rumah Negara yang ditempati oleh PIHAK KEDUA.');

    // $pdf->Ln(3); // New line

    $pdf->Cell(15, 6, '', 0, 0);
    $pdf->MultiCell(0, 6, '4. Apabila PIHAK KEDUA sudah tidak lagi menempati Rumah Negara tersebut maka PIHAK KEDUA tidak
    akan menuntut ganti rugi atas biaya perbaikan/perawatan Rumah Negara Milik Daerah dimaksud.');

$pdf->Cell(15, 6, '', 0, 0);
$pdf->MultiCell(0, 6, "5. Surat Izin Penghunian Rumah Negara Golongan ".$persetujuan['nama_golonganpangkat']." ini hanya berlaku selama pemegangnya (yang 
   berhak) bekerja di lingkungan Pemerintah Kabupaten Tanah Laut.", 0, 'J');
// $pdf->Ln(3); // New line

$pdf->Cell(15, 6, '', 0, 0);
$pdf->MultiCell(0, 6, "6. Pemegang Surat Izin Penghunian Rumah Negara, ini harus mengosongkan Rumah tersebut dan
    menyerahkan Rumah dalam keadaan lengkap kepada pejabat yang ditunjuk dalam waktu :");
// $pdf->Ln(3); // New line
$pdf->Cell(20, 6, '', 0, 0);
$pdf->MultiCell(0, 6, "   1) paling lambat 1 (satu) bulan terhitung sejak saat meninggal dunia, bagi penghuni yang meninggal
        dunia;");
$pdf->Cell(20, 6, '', 0, 0);
$pdf->MultiCell(0, 6, "   2) paling lambat 1 (satu) bulan terhitung sejak keputusan pemberhentian, bagi penghuni yang berhenti
        atas kemauan sendiri atau yang dikenakan hukuman disiplin pemberhentian;");
$pdf->Cell(20, 6, '', 0, 0);
$pdf->MultiCell(0, 6, "   3) paling lambat 2 (dua) minggu terhitung sejak saat terbukti adanya pelanggaran, bagi penghuni yang
        melanggar larangan penghunian rumah negara yang dihuninya;");
// $pdf->Ln(3); // New line

$pdf->Cell(15, 6, '', 0, 0);
$pdf->MultiCell(0, 6, "7. Dilarang memindahkan hak Surat Izin Penghunian Dinas ini atau menyewakan/mengontrakan sebagian
    atau seluruh bangunan Rumah Negara.", 0, 'J');
// $pdf->Ln(3); // New line

$pdf->Cell(15, 6, '', 0, 0);
$pdf->MultiCell(0, 6, "8. Dilarang mengubah atau menambah bangunan Rumah tanpa izin (dari pejabat yang ditunjuk).", 0, 'J');
// $pdf->Ln(3); // New line

$pdf->Cell(15, 6, '', 0, 0);
$pdf->MultiCell(0, 6, "9. Dilarang menggunakan sebagian atau seluruh untuk keperluan lain diluar yang telah ditentukan.", 0, 'J');
// $pdf->Ln(3); // New line

$pdf->Cell(15, 6, '', 0, 0);
$pdf->MultiCell(0, 6, "10. Pemegang Surat Izin Penghunian Rumah Negara wajib memelihara sebaik-baiknya Rumah Negara
      tersebut.", 0, 'J');
// $pdf->Ln(3); // New line

$pdf->Cell(15, 6, '', 0, 0);
$pdf->MultiCell(0, 6, "11. Pemegang Surat Izin Penghunian Rumah Negara wajib membayar sewa/retribusi Rumah Negara.");
// $pdf->Ln(3); // New line

$pdf->Cell(15, 6, '', 0, 0);
$pdf->MultiCell(0, 6, "12. Penghuni membayar pajak-pajak, sewa/retribusi dan lain-lain yang berkaitan dengan penghunian Rumah
      Negara dan membayar biaya pemakaian daya listrik, telepon, air dan/atau gas.");
// $pdf->Ln(3); // New line

$pdf->Cell(15, 6, '', 0, 0);
$pdf->MultiCell(0, 6, "13. Pemegang Surat Izin Rumah Negara bertanggung jawab atas segala biaya untuk memperbaiki kerusakan
      yang terjadi sebagai akibat kesalahan/kelalaiannya.");
// $pdf->Ln(3); // New line

$pdf->Cell(15, 6, '', 0, 0);
$pdf->MultiCell(0, 6, "14. Setelah dikeluarkan Surat Izin Penghunian Rumah Negara, Rumah Negara tersebut harus sudah ditempati
      oleh yang berhak.");
// $pdf->Ln(3); // New line

$pdf->Cell(15, 6, '', 0, 0);
$pdf->MultiCell(0, 6, "15. Pelanggaran terhadap ketentuan-ketentuan dimaksud diatas dapat berakibat dibatalkannya Surat Izin
      Penghunian Rumah Negara.");
// $pdf->Ln(3); // New line

$pdf->Cell(15, 6, '', 0, 0);
$pdf->MultiCell(0, 6, "16. Surat Izin Penghunian ini mulai berlaku pada tanggal ditetapkannya dengan ketentuan bahwa jika
      dikemudian hari ternyata ada kekeliruan, maka Surat Izin Penghunian ini dapat dicabut atau
      diubah sebagaimana mestinya.");
// $pdf->Ln(3); // New line

$pdf->Cell(15, 6, '', 0, 0);
$pdf->MultiCell(0, 6, "17. Rumah Negara tersebut sewaktu-waktu dapat ditarik kembali dari PIHAK KEDUA, apabila PIHAK KEDUA
      tidak mengindahkan ketentuan tersebut di atas atau diperlukan untuk kepentingan dinas oleh
      Pemerintah Daerah Kabupaten Tanah Laut.");

$pdf->Ln(5); // New line

$pdf->Cell(15, 6, '', 0, 0);
$pdf->MultiCell(0, 6, "Demikian Surat Perjanjian Penghunian Rumah Negara ini dibuat rangkap 3 (Tiga) untuk dapat dipergunakan sebagaimana mestinya.");

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(100, 6, "PIHAK KEDUA", 0, 0,'C');
$pdf->Cell(100, 6, "PIHAK KESATU", 0, 1,'C');

$pdf->Cell(100, 6, $persetujuan['jabatan'].' pada '.$persetujuan['nama_instansipemohon'], 0, 0,'C');
$pdf->Cell(100, 6, "Sekretaris Daerah", 0, 1,'C');

$pdf->Cell(100, 6,'Pelaihari,', 0, 0,'C');
$pdf->Cell(100, 6, "Kab. Tanah Laut,", 0, 1,'C');
$pdf->Ln(5); // New line
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(100, 6,'Materai', 0, 1);
$pdf->Cell(100, 6,'yang berlaku', 0, 1);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(100, 6, $persetujuan['gelar_depan'].'. '.$persetujuan['nama'].', '.$persetujuan['gelar_belakang'], 0, 0,'C');
$pdf->Cell(100, 6, $persetujuan['kepala_skpd'] ,0, 1,'C');

$pdf->Cell(100, 6, "NIP. ".$persetujuan['nip'], 0, 0,'C');

$pdf->Cell(100, 6, 'NIP. '.$persetujuan['nip_kepala_skpd'], 0, 1,'C');

$pdf->Output('D', 'data_permohonan_'.$persetujuan['nip'].'_'.$persetujuan['jabatan'].' pada '.$persetujuan['nama_instansipemohon'].'.pdf'); // Menampilkan PDF di browser
?>
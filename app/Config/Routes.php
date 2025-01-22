<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/logout', 'Home::logout');
$routes->post('/proses-login', 'Home::proses_login');
$routes->get('/daftar', 'Home::daftar');
$routes->post('/daftar/asn', 'Home::daftar_simpan');
$routes->get('/dashboard', 'DashboardController::index');
$routes->get('/home/akun', 'Home::akun');
$routes->post('/home/update/(:num)', 'Home::update/$1');

$routes->get('/LoginProses', 'Home::googleCallback');
// $routes->get('/callback', 'Home::index');


$routes->get('/pemohon_baru', 'PermohonanController::baru');
$routes->get('/pemohon', 'PermohonanController::index');
// ... existing routes ...
$routes->get('/permohonan/getPemohonDetails/(:num)', 'PermohonanController::getPemohonDetails/$1');
$routes->get('/permohonan/detail/(:num)', 'PermohonanController::detailPermohonan/$1');
$routes->post('/permohonan/update_status_terima/(:num)', 'PermohonanController::update_status_terima/$1');
$routes->post('/permohonan/update_status_tolak/(:num)', 'PermohonanController::update_status_tolak/$1');


$routes->get('/persetujuan', 'PersetujuanController::index');
$routes->get('tanah/create', 'DashboardController::createTanah');
$routes->post('tanah/store', 'DashboardController::storeTanah');

$routes->get('/status', 'PersetujuanController::index');
$routes->get('penyewa/create', 'DashboardController::createPenyewa');

$routes->post('penyewa/store', 'DashboardController::storePenyewa');

$routes->get('/asn', 'AsnController::index');
$routes->get('/approver', 'ApproverController::index');
$routes->get('/admin', 'AdminController::index');
$routes->get('/golonganrumahdinas', 'GolonganRumahDinasController::index');
$routes->get('/persetujuan', 'PersetujuanController::index');
$routes->get('/instansipemohon', 'InstansiPemohonController::index');
$routes->get('/alamatrumahdinas', 'AlamatRumahDinasController::index');
$routes->get('/golonganpangkat', 'GolonganPangkatController::index');
$routes->get('/instansipencatatan', 'InstansiPencatatanController::index');
$routes->get('/skpd', 'SkpdController::index');


$routes->get('/pemohon', 'PermohonanController::pemohon_baru');



$routes->get('/asn/create', 'AsnController::create');
$routes->post('/asn/store', 'AsnController::store');    
$routes->get('/view/data-asn', 'AsnController::dataAsn');
$routes->get('/asn/edit/(:num)', 'AsnController::edit/$1');
$routes->post('/asn/update/(:num)', 'AsnController::update/$1');
$routes->get('/asn/delete/(:num)', 'AsnController::delete/$1');

$routes->get('/approver/create', 'ApproverController::create');
$routes->post('/approver/store', 'ApproverController::store');
$routes->get('/view/data-approver', 'ApproverController::data-approver');
$routes->get('/approver/edit/(:num)', 'ApproverController::edit/$1');
$routes->post('/approver/update/(:num)', 'ApproverController::update/$1');
$routes->get('/approver/delete/(:num)', 'ApproverController::delete/$1');

$routes->get('/persetujuan/create', 'PersetujuanController::create');
$routes->post('/persetujuan/store', 'PersetujuanController::store');
$routes->get('/view/data-persetujuan', 'PersetujuanController::dataPersetujuan');   
$routes->get('/persetujuan/edit/(:num)', 'PersetujuanController::edit/$1');
$routes->post('/persetujuan/update/(:num)', 'PersetujuanController::update/$1');
$routes->get('/persetujuan/delete/(:num)', 'PersetujuanController::delete/$1');
$routes->get('/persetujuan/download/(:num)', 'PersetujuanController::cetak/$1');
$routes->post('/persetujuan/export_excel', 'PersetujuanController::exportExcel');



$routes->get('/permohonan/create', 'PermohonanController::create');
$routes->post('/permohonan/store', 'PermohonanController::store');
$routes->get('/view/data-permohonan', 'PermohonanController::dataPermohonan');
$routes->get('/permohonan/edit/(:num)', 'PermohonanController::edit/$1');
$routes->post('/permohonan/update/(:num)', 'PermohonanController::update/$1');
$routes->get('/permohonan/delete/(:num)', 'PermohonanController::delete/$1');
$routes->get('/permohonan_detail/edit/(:num)', 'PermohonanController::detail_edit/$1');
$routes->post('/proses_edit_detail_permohonan/(:num)', 'PermohonanController::proses_edit_detail_permohonan/$1');



$routes->get('/permohonan/cetak/(:num)', 'PermohonanController::cetak/$1');

$routes->get('/admin/create', 'AdminController::create');
$routes->post('/admin/store', 'AdminController::store');
$routes->get('/view/data-admin', 'AdminController::dataAdmin');
$routes->get('/admin/edit/(:num)', 'AdminController::edit/$1');
$routes->post('/admin/update/(:num)', 'AdminController::update/$1');
$routes->get('/admin/delete/(:num)', 'AdminController::delete/$1');





$routes->get('/golonganrumahdinas/create', 'GolonganRumahDinasController::create');
$routes->post('/golonganrumahdinas/store', 'GolonganRumahDinasController::store');    
$routes->get('/view/data-golonganrumahdinas', 'GolonganRumahDinasController::dataGolonganRumahDinas');
$routes->get('/golonganrumahdinas/edit/(:num)', 'GolonganRumahDinasController::edit/$1');
$routes->post('/golonganrumahdinas/update/(:num)', 'GolonganRumahDinasController::update/$1');
$routes->get('/golonganrumahdinas/delete/(:num)', 'GolonganRumahDinasController::delete/$1');

$routes->get('/instansipemohon/create', 'InstansiPemohonController::create');
$routes->post('/instansipemohon/store', 'InstansiPemohonController::store');    
$routes->get('/view/data-instansipemohon', 'InstansiPemohonController::dataInstansiPemohon');
$routes->get('/instansipemohon/edit/(:num)', 'InstansiPemohonController::edit/$1');
$routes->post('/instansipemohon/update/(:num)', 'InstansiPemohonController::update/$1');
$routes->get('/instansipemohon/delete/(:num)', 'InstansiPemohonController::delete/$1');


$routes->get('/alamatrumahdinas/create', 'AlamatRumahDinasController::create');
$routes->post('/alamatrumahdinas/store', 'AlamatRumahDinasController::store');    
$routes->get('/view/data-alamatrumahdinas', 'AlamatRumahDinasController::dataAlamatRumahDinas');
$routes->get('/alamatrumahdinas/edit/(:num)', 'AlamatRumahDinasController::edit/$1');
$routes->post('/alamatrumahdinas/update/(:num)', 'AlamatRumahDinasController::update/$1');
$routes->get('/alamatrumahdinas/delete/(:num)', 'AlamatRumahDinasController::delete/$1');

$routes->get('/golonganpangkat/create', 'GolonganPangkatController::create');
$routes->post('/golonganpangkat/store', 'GolonganPangkatController::store');    
$routes->get('/view/data-golonganpangkat', 'GolonganPangkatController::dataGolonganPangkat');
$routes->get('/golonganpangkat/edit/(:num)', 'GolonganPangkatController::edit/$1');
$routes->post('/golonganpangkat/update/(:num)', 'GolonganPangkatController::update/$1');
$routes->get('/golonganpangkat/delete/(:num)', 'GolonganPangkatController::delete/$1');


$routes->get('/instansipencatatan/create', 'InstansiPencatatanController::create');
$routes->post('/instansipencatatan/store', 'InstansiPencatatanController::store');    
$routes->get('/view/data-instansipencatatan', 'InstansiPencatatanController::dataInstansiPencatatan');
$routes->get('/instansipencatatan/edit/(:num)', 'InstansiPencatatanController::edit/$1');
$routes->post('/instansipencatatan/update/(:num)', 'InstansiPencatatanController::update/$1');
$routes->get('/instansipencatatan/delete/(:num)', 'InstansiPencatatanController::delete/$1');


$routes->get('/keluarga/(:num)', 'KeluargaController::index/$1');
$routes->get('/keluarga/create/(:num)', 'KeluargaController::create/$1');
$routes->post('/keluarga/store/(:num)', 'KeluargaController::store/$1');
$routes->get('/keluarga/edit/(:num)', 'KeluargaController::edit/$1');
$routes->post('/keluarga/update/(:num)', 'KeluargaController::update/$1');
$routes->get('/keluarga/delete/(:num)', 'KeluargaController::delete/$1');

$routes->get('/skpd/create', 'SkpdController::create');
$routes->post('/skpd/store', 'SkpdController::store');    
$routes->get('/view/data-skpd/', 'SkpdController::dataGolonganPangkat');
$routes->get('/skpd/edit/(:num)', 'SkpdController::edit/$1');
$routes->post('/skpd/update/(:num)', 'SkpdController::update/$1');
$routes->get('/skpd/delete/(:num)', 'SkpdController::delete/$1');

// $routes->get('download/(:segment)', 'FileController::download/$1');
$routes->get('download/sk/(:num)', 'FileController::downloadSK/$1');
$routes->get('download/ktp/(:num)', 'FileController::downloadKTP/$1');
$routes->get('download/kk/(:num)', 'FileController::downloadKK/$1');
$routes->get('download/pas_foto/(:num)', 'FileController::downloadPasFoto/$1');
$routes->get('download/foto_rumah/(:num)', 'FileController::downloadFotoRumah/$1');
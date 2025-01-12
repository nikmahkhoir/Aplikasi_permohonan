<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Models\AsnModel;
use App\Models\InstansiPemohonModel; // Import the InstansiPemohonModel
use App\Models\GolonganPangkatModel;
use App\Models\ApproverModel;
use App\Models\KeluargaModel;

use Google\Client as GoogleClient;
use Google\Service\Oauth2;
class Home extends BaseController
{
    protected $loginModel;
    protected $AsnModel;
    protected $InstansiPemohonModel;
    protected $GolonganPangkatModel;
    protected $ApproverModel;
    protected $KeluargaModel;
    public function __construct()
    {
        $this->loginModel = new LoginModel();
        $this->AsnModel = new AsnModel();
        $this->InstansiPemohonModel = new InstansiPemohonModel();
        $this->GolonganPangkatModel = new GolonganPangkatModel();
        $this->ApproverModel = new ApproverModel();
        $this->KeluargaModel = new KeluargaModel();
    }
    public function index()
    {
        $client = new GoogleClient();
        $client->setClientId(config('OAuth')->googleClientId);
        $client->setClientSecret(config('OAuth')->googleClientSecret);
        $client->setRedirectUri(config('OAuth')->redirectUri);
        $client->addScope(config('OAuth')->googleScopes);

        $googleAuthUrl = $client->createAuthUrl();
        
        // Debugging
        log_message('debug', 'Google Auth URL: ' . $googleAuthUrl);
        
        return view('welcome_message', ['googleAuthUrl' => $googleAuthUrl]);
    }

    public function googleCallback()
    {
        $client = new GoogleClient();
        // var_dump($client);exit;
        $client->setClientId(config('OAuth')->googleClientId);
        $client->setClientSecret(config('OAuth')->googleClientSecret);
        $client->setRedirectUri(config('OAuth')->redirectUri); // Corrected to use config directly
        $client->addScope(config('OAuth')->googleScopes);

        if (isset($_GET['code'])) {
            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        // var_dump($token);exit;
            $client->setAccessToken($token['access_token']);

            $oauth2 = new Oauth2($client);
            $userInfo = $oauth2->userinfo->get();

            // Ambil email dari informasi pengguna
            $email = $userInfo->email;

            // Cek apakah email sudah ada di database
            $user = $this->loginModel->where('username', $email)->first();

            if (!$user) {
                // Jika belum ada, insert ke database
                $this->loginModel->insert([
                    'username' => $email,
                    // 'username' => $userInfo->name,
                    'level' => 'asn', // Atur level sesuai kebutuhan
                    'password' => md5('PASSWORD'), // Kosongkan password karena login menggunakan Google
                ]);
                $user = $this->loginModel->where('username', $email)->first();
            }

            // Simpan data ke session
            $asn = $this->AsnModel->where('id_login', $user['id_login'])->first();
            // var_dump($asn);exit;
            if ($user['level']=='asn') {
                if ($asn) {
                    $id_asn=$asn['id_asn'];
                }else{
                    $id_asn='';
                }
                session()->set([
                    'id_login' => $user['id_login'],
                    'username' => $user['username'],
                    'level' => $user['level'],
                    'id_asn'=>$id_asn,
                    'logged_in' => true
                ]);
            }else{
                session()->set([
                    'id_login' => $user['id_login'],
                    'username' => $user['username'],
                    'level' => $user['level'],
                    'logged_in' => true
                ]);
            }
            
            if ($user['level']=='asn'){

            
            $user = $this->loginModel->where('username', $email)->first();
            $cek=$this->AsnModel->where('id_login', $user['id_login'])->first();
            if ($cek) {
                return redirect()->to('/dashboard');
            }else{
                return redirect()->to('/daftar');
            }
        }else{
            return redirect()->to('/dashboard');
        }

            // Redirect ke halaman dashboard
        }

        // Jika tidak ada kode, redirect ke halaman login
        return redirect()->to('/login')->with('error', 'Login gagal.');
    }

    public function daftar_simpan()
    {
        $this->AsnModel->save([
            'nama' => $this->request->getPost('nama'),
            'gelar_depan' => $this->request->getPost('gelar_depan'),
            'gelar_belakang' => $this->request->getPost('gelar_belakang'),
            'nip' => $this->request->getPost('nip'),
            'no_ktp' => $this->request->getPost('no_ktp'),
            'no_kk' => $this->request->getPost('no_kk'),
            'npwp' => $this->request->getPost('npwp'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp'),
            'id_instansipemohon' => $this->request->getPost('instansi_pemohon'),
            'id_golonganpangkat' => $this->request->getPost('id_golonganpangkat'),
            'jabatan' => $this->request->getPost('jabatan'),
            'gaji_pokok' => $this->request->getPost('gaji_pokok'),
            'id_login' => $this->request->getPost('id_login'),
        ]);

        $id_login = $this->request->getPost('id_login');
        $new_password = $this->request->getPost('password');

        // Update the login table with the new password
        $this->loginModel->update($id_login, [
            'password' => md5($new_password) // Hash the password before saving
        ]);

        return redirect()->to('/dashboard')->with('success', 'Data ASN berhasil ditambahkan.');
    }

    public function proses_login()
    {
        // Ambil inputan dari form
        $username = $this->request->getPost('username');
        $password = md5($this->request->getPost('password'));
        // var_dump($password);exit;
        // Instansiasi model
        $loginModel = new LoginModel();
        
        // Cari user berdasarkan username
        $user = $loginModel->where('username', $username)->first();
        // var_dump($user['password']);exit;
        
        // Cek apakah user ditemukan dan password cocok
        if ($password==$user['password']) {
            // Jika login berhasil, simpan data ke session
            $asn = $this->AsnModel->where('id_login', $user['id_login'])->first();
            // var_dump($asn);exit;
            if ($user['level']=='asn') {
                session()->set([
                    'id_login' => $user['id_login'],
                    'username' => $user['username'],
                    'level' => $user['level'],
                    'id_asn'=>$asn['id_asn'],
                    'logged_in' => true
                ]);
            }else{
                session()->set([
                    'id_login' => $user['id_login'],
                    'username' => $user['username'],
                    'level' => $user['level'],
                    'logged_in' => true
                ]);
            }
            // var_dump($username);exit;

            // Redirect ke halaman dashboard atau halaman lain
            return redirect()->to('/dashboard');
        } else {
            // Jika login gagal, kembali ke halaman login dengan pesan error
            return redirect()->back()->with('error', 'Username atau password salah.');
        }
    }

    public function daftar()
    {
    //    var_dump('a');exit;
        $data['instansipemohon'] = $this->InstansiPemohonModel->findAll();
        $data['golongan'] = $this->GolonganPangkatModel->findAll();
        return view('daftar',$data);
    }
    public function akun()
    {
        // Ambil semua data ASN
        if (session('level')=='asn') {
            $data['keluarga'] = $this->KeluargaModel
            ->join('asn','asn.id_asn=keluarga.id_asn','left')
            ->where('id_login', session('id_login'))->countAllResults();

            $data['akun'] = $this->AsnModel
            ->join('instansipemohon','asn.id_instansipemohon=instansipemohon.id_instansipemohon','left')
            ->join('golonganpangkat','asn.id_golonganpangkat=golonganpangkat.id_golonganpangkat','left')
            ->join('login','login.id_login=asn.id_login','left')
            ->where('login.id_login',session('id_login'))
            ->first();
        }else {
            $data['akun'] = $this->ApproverModel
            ->join('login','login.id_login=approver.id_login','left')
            ->first();
        }
        // var_dump($data['akun']);exit;
       
        echo view('layout/header');
        echo view('layout/menu');
        echo view('akun', $data);
        echo view('layout/footer');
    }
    public function update($id)
    {
        $this->loginModel->update($id, [
            'username' => $this->request->getPost('username'),
            'password' => md5($this->request->getPost('password')),
      
        ]);

        return redirect()->to('/dashboard')->with('success', 'Data berhasil diupdate.');
    }
    public function logout()
    {
        // Clear the session data
        session()->destroy();

        // Redirect to the login page with a success message
        return redirect()->to('/')->with('success', 'You have been logged out successfully.');
    }
}
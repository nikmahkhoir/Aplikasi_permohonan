<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class OAuth extends BaseConfig
{
    public string $googleClientId = '330396029158-1mphe2b22nfr91du4r89q304nhurvenq.apps.googleusercontent.com';
    public string $googleClientSecret = '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';
    public string $redirectUri = 'https://sirudi.bpkad.tanahlautkab.go.id/LoginProses'; // Pastikan path ini benar

    // Tambahkan konfigurasi untuk Google Auth
    public string $googleScopes = 'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile';
}

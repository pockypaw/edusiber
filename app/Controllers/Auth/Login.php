<?php

namespace App\Controllers\Auth;

use CodeIgniter\Controller;
use Myth\Auth\Config\Auth as AuthConfig;
use Myth\Auth\Services\AuthenticationService;

class Login extends Controller
{
    protected $auth;
    protected $config;

    public function __construct()
    {
        $this->auth = service('authentication'); // Menggunakan layanan autentikasi
        $this->config = config('Auth'); // Mengambil konfigurasi Auth
    }

    public function index()
    {
        // Jika pengguna sudah login, arahkan mereka ke dashboard
        if ($this->auth->check()) {
            return redirect()->to('/dashboard');
        }

        // Tampilkan halaman login
        return view('pages/login');
    }

    
}

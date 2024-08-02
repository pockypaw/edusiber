<?php

namespace App\Controllers\Auth;

use CodeIgniter\Controller;

class Register extends Controller
{
    public function index(): string
    {
        return view('pages/register');
    }
}


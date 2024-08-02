<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index(): string
    {
        $data = ['title' => 'Home'];
        return view('pages/home', $data);
    }

    public function about(): string
    {
        $data = ['title' => 'About me'];
        return view('pages/about', $data);
    }
    public function contact(): string
    {
        $data = [
            'title' => 'Contact me',
       
            'alamat' => [
                [
                    'tipe' => 'Rumah',
                    'alamat' => 'Jalan Jalan',
                    'kota' => 'Kota'
                ],
                [
                    'tipe' => 'Kantor',
                    'alamat' => 'Jalan Jalan',
                    'kota' => 'Kota'
                ]
            ]
        ];
        return view('pages/contact', $data);
    }
}

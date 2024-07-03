<?php

namespace App\Controllers;

class KontakPenting extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Kontak Penting',
            'page' => 'v_kontak_penting',
        ];
        return view('v_template', $data);
    }
}
<?php

namespace App\Controllers;

class LangkahEvakuasi extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Langkah Evakuasi',
            'page' => 'v_langkah_evakuasi',
        ];
        return view('v_template', $data);
    }
}
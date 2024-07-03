<?php

namespace App\Controllers;

use App\Models\ModelEvakuasi;

class Peta extends BaseController
{
    protected $modelEvakuasi;

    public function __construct()
    {
        $this->modelEvakuasi = new ModelEvakuasi();
    }
    
    public function index()
    {
        $data = [
            'judul' => 'Peta',
            'page' => 'v_peta',
            'evakuasi' => $this->modelEvakuasi->getAllData(),
        ];
        return view('v_template', $data);
    }
}
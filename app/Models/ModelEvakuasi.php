<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelEvakuasi extends Model
{
    public function getAllData()
    {
        return $this->db->table('tbl_evakuasi')->get()->getResultArray();
    }
}
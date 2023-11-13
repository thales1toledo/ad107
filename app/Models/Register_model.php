<?php

namespace App\Models;

use CodeIgniter\Model;

class Register_model extends Model
{
    protected $table = 'pessoas';

    public function insert_data($name, $naturalidade)
    {
        $data = [
            'nome' => $name,
            'naturalidade' => $naturalidade,
        ];

        $this->db->table($this->table)->insert($data);
    }
}
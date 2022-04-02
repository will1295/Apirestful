<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CuentaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'fondos' => '100',
            'idcliente'    => '5'
        ];

        $this->db->table('tblcuenta')->insert($data);
    }
}
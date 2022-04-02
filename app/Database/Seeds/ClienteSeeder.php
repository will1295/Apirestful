<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ClienteSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'nombre' => 'a',
            'apellido'    => 'montes',
            'telefono'    => 12345678,
            'email'    => 'darth@theempire.com'
        ];

        $this->db->table('tblcliente')->insert($data);
    }
}
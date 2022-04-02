<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tblclientes extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idcliente'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nombre'       => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => false   
            ],
            'apellido'       => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => false   
            ],
            'telefono'       => [
                'type'       => 'INT',
                'constraint' => '8',
                'null'       => false   
            ],
            'email'       => [
                'type'       => 'VARCHAR',
                'constraint' => '75',
                'null'       => false   
            ],
            'fecha_creacion datetime default current_timestamp',
            'fecha_modificado datetime default current_timestamp on update current_timestamp',
            'fecha_eliminado datetime default null',
        ]);
        $this->forge->addKey('idcliente', true);
        $this->forge->createTable('tblcliente');
    }

    public function down()
    {
        $this->forge->dropTable('tblcliente');
    }
}

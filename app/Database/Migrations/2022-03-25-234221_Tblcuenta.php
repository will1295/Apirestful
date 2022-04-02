<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tblcuenta extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idcuenta'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'fondos'       => [
                'type'       => 'DECIMAL',
                'constraint' => '65',
                'null'       => false   
            ],
            'idcliente'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'fecha_creacion datetime default current_timestamp',
            'fecha_modificado datetime default current_timestamp on update current_timestamp',
            'fecha_eliminado datetime default null',
        ]);
        $this->forge->addPrimaryKey('idcuenta', true);
        $this->forge->addForeignKey('idcliente', 'tblcliente', 'idcliente');
        $this->forge->createTable('tblcuenta');
    }

    public function down()
    {
        $this->forge->dropTable('tblcuenta');
    }
}

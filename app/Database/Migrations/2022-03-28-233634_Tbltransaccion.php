<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tbltransaccion extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idtransaccion'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'idcuenta'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'monto'       => [
                'type'       => 'DECIMAL',
                'constraint' => '65',
                'null'       => false   
            ],
            'idtipot'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'fecha_creacion datetime default current_timestamp',
            'fecha_modificado datetime default current_timestamp on update current_timestamp',
            'fecha_eliminado datetime default null',
        ]);
        $this->forge->addPrimaryKey('idtransaccion', true);
        $this->forge->addForeignKey('idcuenta','tblcuenta','idcuenta');
        $this->forge->addForeignKey('idtipot','tbltipot','idtipot');
        $this->forge->createTable('tbltransaccion');
    }

    public function down()
    {
        $this->forge->dropTable('tbltransaccion');
    }
}

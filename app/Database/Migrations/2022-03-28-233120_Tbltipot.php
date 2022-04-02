<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tbltipot extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idtipot'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'descrtipo'       => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => false   
            ],
            'fecha_creacion datetime default current_timestamp',
            'fecha_modificado datetime default current_timestamp on update current_timestamp',
            'fecha_eliminado datetime default null',
        ]);
        $this->forge->addPrimaryKey('idtipot', true);
        $this->forge->createTable('tbltipot');
    }

    public function down()
    {
        $this->forge->dropTable('tbltipot');
    }
}

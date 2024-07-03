<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Evakuasi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_evakuasi'            => [
                'type'          => 'INT',
                'constraint'    => 5,
                'unsigned'      => true,
                'auto_increment' => true
            ],
            'nama_evakuasi'     => [
                'type'          => 'VARCHAR',
                'constraint'    => 100,
            ],
            'latitude'     => [
                'type'          => 'VARCHAR',
                'constraint'    => 100,
            ],
            'longitude'     => [
                'type'          => 'VARCHAR',
                'constraint'    => 100,
            ],
            'foto'     => [
                'type'          => 'VARCHAR',
                'constraint'    => 100,
            ],
        ]);
        $this->forge->addKey('id_evakuasi', true);
        $this->forge->createTable('evakuasi');
    }

    public function down()
    {
        $this->forge->dropTable('evakuasi');
    }
}

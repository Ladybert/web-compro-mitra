<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableContent extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => false],
            'image'       => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'title'       => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'created_at'  => ['type' => 'TIMESTAMP', 'null' => false, 'default' => '0000-00-00 00:00:00'],
            'updated_at'  => ['type' => 'TIMESTAMP', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('contents');
    }

    public function down()
    {
        $this->forge->dropTable('contents');
    }
}

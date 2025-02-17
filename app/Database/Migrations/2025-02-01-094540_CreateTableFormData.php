<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableFormData extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => false],
            'name'       => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'email'      => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'service'    => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'message'    => ['type' => 'TEXT', 'null' => true],
            'created_at' => ['type' => 'TIMESTAMP', 'null' => false, 'default' => '0000-00-00 00:00:00'],
            'updated_at' => ['type' => 'TIMESTAMP', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('form_datas');
    }

    public function down()
    {
        $this->forge->dropTable('form_datas');
    }
}

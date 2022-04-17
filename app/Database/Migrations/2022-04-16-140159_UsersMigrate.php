<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UsersMigrate extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type' => "VARCHAR",
                'constraint' => 255,
                'null' => false
            ],
            'email' => [
                'type' => 'TEXT',
                'null' => false
            ],
            'name' => [
                'type' => 'TEXT',
                'null' => false
            ],
            'gender' => [
                'type' => "VARCHAR",
                'constraint' => 5,
            ],
            'address' => [
                'type' => "TEXT",
                'null' => false
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'photo' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'role' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => false
            ],
            'password' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'created_at' => [
                'type' => 'DATETIME'
            ],
            'updated_at' => [
                'type' => 'DATETIME'
            ],
            'deleted_at' => [
                'type' => 'DATETIME'
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable("users");
    }
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePostsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id" => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
                ],
            'author' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'default' => 'John Doe',
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['published', 'draft'],
                'default' => 'draft',
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);

        // Membuat primary key
        $this->forge->addKey('id', TRUE);
        // Membuat tabel posts
        $this->forge->createTable('posts', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('posts');
    }
}
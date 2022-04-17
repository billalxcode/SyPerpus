<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'email' => 'admin@localhost',
                'username' => 'admin',
                'name' => "Super Admin",
                'gender' => "L",
                'address' => "Jalan lurus terus gak ada belok nya",
                "phone" => null,
                "role" => 'admin',
                'password' => password_hash('123456', PASSWORD_DEFAULT)
            ],
            [
                'email' => 'staff@localhost',
                'username' => 'staff',
                'name' => "Staff Admin",
                'gender' => "L",
                'address' => "Jalan lurus terus gak ada belok nya",
                "phone" => null,
                "role" => 'staff',
                'password' => password_hash('123456', PASSWORD_DEFAULT)
            ],
            [
                'email' => 'anggota@localhost',
                'username' => 'billalxcode',
                'name' => "Billal Fauzan",
                'gender' => "L",
                'address' => "Jalan lurus terus gak ada belok nya",
                "phone" => null,
                "role" => 'anggota',
                'password' => password_hash('123456', PASSWORD_DEFAULT)
            ],
        ];

        $usersTable = $this->db->table("users");
        $usersTable->insertBatch($data);
    }
}

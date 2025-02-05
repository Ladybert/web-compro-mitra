<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\UserModel;

class UserSeeder extends Seeder
{
    public function run()
    {
        $userModel = new UserModel();

        $users = [
            [
                'name'     => 'Admin Utama',
                'email'    => 'utama@gmail.com',
                'password' => password_hash('admin#utama123*', PASSWORD_DEFAULT)
            ],
            [
                'name'     => 'Admin Cadangan',
                'email'    => 'cadangan@gmail.com',
                'password' => password_hash('cadangan#admin321*', PASSWORD_DEFAULT)
            ]
        ];

        foreach ($users as $user) {
            $userModel->createUser($user);
        }
    }
}

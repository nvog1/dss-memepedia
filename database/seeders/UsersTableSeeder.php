<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!file_exists('storage/app/public/users/')) mkdir('storage/app/public/users/');

        $admin = new User();
        $admin->username = 'admin';
        $admin->name = 'admin';
        $admin->surname = 'admin';
        $admin->email = 'admin@a.b';
        $admin->password = '$2y$10$V2hQxjf/KGW5YC3j27ay2.CvOqI.SyaxPsRMZ3dvb2cUKvc5PSxje'; // Contraseña: admin123
        $admin->is_admin = true;
        copy('database/seeders/users/1', 'storage/app/public/users/1');
        $admin->save();

        $user1 = new User();
        $user1->username = 'peepo';
        $user1->name = 'VanOlmen';
        $user1->email = 'peepo@gmail.com';
        $user1->password = '$2y$10$rMRTinssn1DHaMS2OsgdAe6TsMykYPx41wiQt/4942.oCNWAXbAfy'; // Contraseña: 123
        copy('database/seeders/users/2', 'storage/app/public/users/2');
        $user1->save();

        $user2 = new User();
        $user2->username = 'rick';
        $user2->name = 'Sanchez';
        $user2->surname = 'Matias';
        $user2->email = 'rick@gmail.com';
        $user2->password = '$2y$10$afx9c2CMUC8K4rPdtQh3SeDtcbOwHIKIF12iXPATzU4aEzTtfOMYm'; // Contraseña: 234
        copy('database/seeders/users/3', 'storage/app/public/users/3');
        $user2->save();
    }
}

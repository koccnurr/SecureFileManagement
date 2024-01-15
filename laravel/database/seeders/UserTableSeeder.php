<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{ public function run()
    {
        // Root rolünü oluştur
        $this->call(RolesAndPermissionsSeeder::class);

        // Root kullanıcısını oluştur ve root rolünü ata
        $rootUser = Sentinel::registerAndActivate([
            'first_name' => 'Root',
            'last_name' => 'User',
            'email' => 'root@example.com',
            'password' => Hash::make('password'),
        ]);

        $rootRole = Sentinel::findRoleBySlug('root');
        $rootRole->users()->attach($rootUser);
    }
}
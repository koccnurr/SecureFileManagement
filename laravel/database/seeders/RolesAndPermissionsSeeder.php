<?php

namespace Database\Seeders;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Database\Seeder;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        $rootRole = Sentinel::findRoleBySlug('root');

        if (!$rootRole) {
            // Root rolünü oluştur
            $rootRole = Sentinel::getRoleRepository()->createModel()->create([
                'name' => 'Root',
                'slug' => 'root',
                'permissions' => [
                    'login' => true, // Giriş yetkisi
                ],
            ]);
        }
    }
}
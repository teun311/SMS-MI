<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
            [
                'id'    => 1,
                'title' => 'user_module_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_module_access',
            ],
            [
                'id'    => 3,
                'title' => 'permission_create_access',
            ],
        ];

        Permission::create($permission);
    }
}

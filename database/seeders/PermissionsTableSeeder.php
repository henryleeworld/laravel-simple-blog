<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'post_create',
            ],
            [
                'id'    => 2,
                'title' => 'post_show',
            ],
            [
                'id'    => 3,
                'title' => 'post_access',
            ],
            /*
            [
                'id'    => 4,
                'title' => 'post_edit',
            ],
            [
                'id'    => 5,
                'title' => 'post_delete',
            ],
            */
        ];

        Permission::insert($permissions);
    }
}

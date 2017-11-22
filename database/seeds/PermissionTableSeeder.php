<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;
class PermissionTableSeeder extends Seeder
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
                'name' => 'role-list',
                'display_name' => 'Display Role Listing',
                'description' => 'See only Listing Of Role'
            ],
            [
                'name' => 'role-create',
                'display_name' => 'Create Role',
                'description' => 'Create New Role'
            ],
            [
                'name' => 'role-edit',
                'display_name' => 'Edit Role',
                'description' => 'Edit Role'
            ],
            [
                'name' => 'role-delete',
                'display_name' => 'Delete Role',
                'description' => 'Delete Role'
            ],
            [
                'name' => 'post-list',
                'display_name' => 'Display post Listing',
                'description' => 'See only Listing Of post'
            ],
            [
                'name' => 'post-create',
                'display_name' => 'Create post',
                'description' => 'Create New post'
            ],
            [
                'name' => 'post-edit',
                'display_name' => 'Edit post',
                'description' => 'Edit post'
            ],
            [
                'name' => 'post-delete',
                'display_name' => 'Delete post',
                'description' => 'Delete post'
            ]
        ];

        foreach ($permission as $key => $value) {
            Permission::create($value);
        }
    }
}

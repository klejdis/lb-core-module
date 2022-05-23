<?php

namespace Modules\LBCore\Database\Seeders;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\LBCore\Entities\Permission;
use Modules\LBCore\Entities\User;
use Modules\LBCore\Repositories\PermissionRepository;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::truncate();


        $permission = new PermissionRepository();

        $permission->createMultiple([


            /**
             * -----------------------------------------------------------------------
             * Users
             * -----------------------------------------------------------------------
             */

            [
                'name' => 'Browse Users',
                'slug' => 'browse-users',
                'module' => 'Users',
            ],

            [
                'name' => 'Update Profile',
                'slug' => 'update-profile',
                'module' => 'Users',
            ],

            [
                'name' => 'Read Users',
                'slug' => 'read-users',
                'module' => 'Users',
            ],

            [
                'name' => 'Edit Users',
                'slug' => 'edit-users',
                'module' => 'Users',
            ],

            [
                'name' => 'Add Users',
                'slug' => 'create-users',
                'module' => 'Users',
            ],

            [
                'name' => 'Delete Users',
                'slug' => 'delete-users',
                'module' => 'Users',
            ],

            [
                'name' => 'User Permissions',
                'slug' => 'permissions-users',
                'module' => 'Users',
            ],

            [
                'name' => 'Change Password',
                'slug' => 'change-password-users',
                'module' => 'Users',
            ],

            /**
             * -----------------------------------------------------------------------
             * Roles
             * -----------------------------------------------------------------------
             */

            [
                'name' => 'Browse Roles',
                'slug' => 'browse-roles',
                'module' => 'Roles',
            ],

            [
                'name' => 'Read Roles',
                'slug' => 'read-roles',
                'module' => 'Roles',
            ],

            [
                'name' => 'Edit Roles',
                'slug' => 'edit-roles',
                'module' => 'Roles',
            ],

            [
                'name' => 'Add Roles',
                'slug' => 'create-roles',
                'module' => 'Roles',
            ],

            [
                'name' => 'Delete Roles',
                'slug' => 'delete-roles',
                'module' => 'Roles',
            ],

            /**
             * -----------------------------------------------------------------------
             * Settings
             * -----------------------------------------------------------------------
             */

            [
                'name' => 'Browse Settings',
                'slug' => 'browse-settings',
                'module' => 'Settings',
            ],

            [
                'name' => 'Edit Settings',
                'slug' => 'edit-settings',
                'module' => 'Settings',
            ],


            /**
             * -----------------------------------------------------------------------
             * Dashboard
             * -----------------------------------------------------------------------
             */


            [
                'name' => 'Browse Dashboard',
                'slug' => 'browse-dashboard',
                'module' => 'Dashboard',
            ],


        ]);

    }
}

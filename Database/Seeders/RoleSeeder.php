<?php

namespace Modules\LBCore\Database\Seeders;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\LBCore\Entities\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = Sentinel::getRoleRepository();

        // Create an Admin group
        $groups->createModel()->create(
            [
                'name' => 'Admin',
                'slug' => 'admin',
            ]
        );

        // Create an Users group
        $groups->createModel()->create(
            [
                'name' => 'User',
                'slug' => 'user',
            ]
        );
    }
}

<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Admin', 'guard_name' => 'api']);
        Role::create(['name' => 'Athlete', 'guard_name' => 'api']);
        Role::create(['name' => 'Member', 'guard_name' => 'api']);
        Role::create(['name' => 'Coach', 'guard_name' => 'api']);
    }
}

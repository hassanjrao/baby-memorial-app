<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role=Role::firstOrCreate([
            "name"=>"admin",
            "guard_name"=>"web",
        ]);

        $role=Role::firstOrCreate([
            "name"=>"user",
            "guard_name"=>"web",
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define roles and create them
        $roles = ['admin'];

        foreach ($roles as $rolen) {
            $role  = Role::create(['name' => $rolen]);
        }

        $permissions = Permission::pluck('id')->toArray();
            $role->syncPermissions($permissions);

        $this->command->info('Roles seeded successfully!');
    }
}

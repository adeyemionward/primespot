<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
    */
    public function run()
    {
        //     // Create multiple users using the factory
        //     \App\Models\User::factory(1)->create();
        // }

            $user = User::create([
                'firstname' => 'Joshua',
                'lastname' => 'Denila',
                'email' => 'joshua@example.com',
                'gender' => 'male',
                'status' => 'active',
                'user_type' => '1', //admin staff
                'password' => bcrypt('12345678'),
                'company_id' => NULL,
            ]);

            // Assign a role to the user
            $user->assignRole('admin');

            // Retrieve all permissions
            $allPermissions = Permission::all();

            // Attach all permissions to the admin role
            $user->syncPermissions($allPermissions);

            $this->command->info('Users seeded successfully!');

    }
}

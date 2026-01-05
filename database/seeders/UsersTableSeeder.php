<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@demo.com',
                'password' => Hash::make('Admin@123'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Manager',
                'email' => 'manager@demo.com',
                'password' => Hash::make('Manager@123'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Agent',
                'email' => 'agent@demo.com',
                'password' => Hash::make('Agent@123'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        // Assign roles using the spatie model_has_roles table
        $adminId = DB::table('users')->where('email', 'admin@demo.com')->value('id');
        $managerId = DB::table('users')->where('email', 'manager@demo.com')->value('id');
        $agentId = DB::table('users')->where('email', 'agent@demo.com')->value('id');

        $adminRoleId = DB::table('roles')->where('name', 'Admin')->value('id');
        $managerRoleId = DB::table('roles')->where('name', 'Manager')->value('id');
        $agentRoleId = DB::table('roles')->where('name', 'Agent')->value('id');

        if ($adminId && $adminRoleId) {
            DB::table('model_has_roles')->insert([
                'role_id' => $adminRoleId,
                'model_type' => 'App\\Models\\User',
                'model_id' => $adminId,
            ]);
        }
        if ($managerId && $managerRoleId) {
            DB::table('model_has_roles')->insert([
                'role_id' => $managerRoleId,
                'model_type' => 'App\\Models\\User',
                'model_id' => $managerId,
            ]);
        }
        if ($agentId && $agentRoleId) {
            DB::table('model_has_roles')->insert([
                'role_id' => $agentRoleId,
                'model_type' => 'App\\Models\\User',
                'model_id' => $agentId,
            ]);
        }
    }
}

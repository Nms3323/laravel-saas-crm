<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Create roles
        DB::table('roles')->insert([
            ['name' => 'Admin', 'guard_name' => 'web', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Manager', 'guard_name' => 'web', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Agent', 'guard_name' => 'web', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);

        // Create some permissions as examples
        DB::table('permissions')->insert([
            ['name' => 'manage leads', 'guard_name' => 'web', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'manage invoices', 'guard_name' => 'web', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'view reports', 'guard_name' => 'web', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);

        // Assign permissions to roles (Admin gets all)
        $adminId = DB::table('roles')->where('name', 'Admin')->value('id');
        $manageLeadsId = DB::table('permissions')->where('name', 'manage leads')->value('id');
        $manageInvoicesId = DB::table('permissions')->where('name', 'manage invoices')->value('id');
        $viewReportsId = DB::table('permissions')->where('name', 'view reports')->value('id');

        if ($adminId) {
            DB::table('role_has_permissions')->insert([
                ['role_id' => $adminId, 'permission_id' => $manageLeadsId],
                ['role_id' => $adminId, 'permission_id' => $manageInvoicesId],
                ['role_id' => $adminId, 'permission_id' => $viewReportsId],
            ]);
        }

        // Manager gets leads and reports
        $managerId = DB::table('roles')->where('name', 'Manager')->value('id');
        if ($managerId) {
            DB::table('role_has_permissions')->insert([
                ['role_id' => $managerId, 'permission_id' => $manageLeadsId],
                ['role_id' => $managerId, 'permission_id' => $viewReportsId],
            ]);
        }

        // Agent gets leads only
        $agentId = DB::table('roles')->where('name', 'Agent')->value('id');
        if ($agentId) {
            DB::table('role_has_permissions')->insert([
                ['role_id' => $agentId, 'permission_id' => $manageLeadsId],
            ]);
        }
    }
}

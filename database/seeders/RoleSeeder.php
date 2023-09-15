<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles_config = config('permission.roles');
        $tenants = $tenants = Tenant::get(['id']);


        foreach ($tenants as $tenant) {
            $roles = [];
            foreach ($roles_config as $key => $role) {
                $roles[] = [
                    'tenant_id' => $tenant->id,
                    'name' => $role,
                    'guard_name' => 'web',
                    'created_at' => now(),
                ];
            }

            DB::table('roles')->insert($roles);
        }
    }
}

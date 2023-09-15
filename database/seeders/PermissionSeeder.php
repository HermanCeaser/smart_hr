<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permission_prefixes = config('permission.permission_prefixes');
        $modules = config('permission.modules');

        $permissions = [];
        foreach ($modules as $moduleKey => $moduleName) {
            foreach ($permission_prefixes as $prefix) {
                $permissionName = ucwords(str_replace('_', ' ', $prefix . ' ' . $moduleKey));
                $permissions[] = [
                    'name' => $permissionName,
                    'slug' => strtolower(str_replace(' ', '-', $permissionName)),
                    'guard_name' => 'web',
                    'module' => $moduleName,
                    'created_at' => now(),
                ];
            }
        }

        DB::table('permissions')->insert($permissions);
    }
}

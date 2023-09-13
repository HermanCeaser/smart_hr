<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tenants = Tenant::get(['id']);
        foreach ($tenants as $tenant) {
            DB::table('departments')->insert([
                [
                    'name' => 'Accounting',
                    'tenant_id' => $tenant->id
                ],
                [
                    'name' => 'Finance',
                    'tenant_id' => $tenant->id
                ],
                [
                    'name' => 'Human Resource',
                    'tenant_id' => $tenant->id
                ],
                [
                    'name' => 'Management',
                    'tenant_id' => $tenant->id
                ],
                [
                    'name' => 'IT / Software',
                    'tenant_id' => $tenant->id
                ],
                [
                    'name' => 'Board of Directors',
                    'tenant_id' => $tenant->id
                ],
                [
                    'name' => 'Marketing',
                    'tenant_id' => $tenant->id
                ],
                [
                    'name' => 'Legal',
                    'tenant_id' => $tenant->id
                ],
            ]);
        }
    }

    }


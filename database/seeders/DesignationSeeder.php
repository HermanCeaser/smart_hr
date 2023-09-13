<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tenants = Tenant::get(['id']);
        foreach ($tenants as $tenant) {
            DB::table('designations')->insert([
                [
                    'name' => 'Accountant',
                    'tenant_id' => $tenant->id
                ],
                [
                    'name' => 'Chief Finance Officer (CFO)',
                    'tenant_id' => $tenant->id
                ],
                [
                    'name' => 'Human Resource Manager (HR)',
                    'tenant_id' => $tenant->id
                ],
                [
                    'name' => 'Chief Executive Officer (CEO)',
                    'tenant_id' => $tenant->id
                ],
                [
                    'name' => 'Chief Technical Officer CTO)',
                    'tenant_id' => $tenant->id
                ],
                [
                    'name' => 'Director',
                    'tenant_id' => $tenant->id
                ],
                [
                    'name' => 'Lead Developer',
                    'tenant_id' => $tenant->id
                ],
                [
                    'name' => 'Junior Developer',
                    'tenant_id' => $tenant->id
                ],
                [
                    'name' => 'Marketing Strategist',
                    'tenant_id' => $tenant->id
                ],
                [
                    'name' => 'Business Relations',
                    'tenant_id' => $tenant->id
                ],
            ]);
        }
    }
}

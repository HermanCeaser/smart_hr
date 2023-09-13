<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Staff;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tenants = Tenant::all()->pluck('id')->toArray(); // Array of tenant IDs [1,2,3,4,5,6,7,8,9,10]
        foreach ($tenants as $tenant) {

            $stafflist = Staff::factory()
                ->times(25)
                ->state(new Sequence(
                    fn ($sequence) => [
                        'department_id' => Department::where('tenant_id', $tenant)->get()->random()->id,
                        'designation_id' => Designation::where('tenant_id', $tenant)->get()->random()->id,
                        'tenant_id' => $tenant,
                    ],
                ))
                ->make();

            $stafflist->each(function ($staff) {
                $user = User::factory()->create();
                // $tenant = $tenants->random(); // get random tenant_id from tenant_list
                DB::table('tenant_user')->insert([
                    'user_id' => $user->id,
                    'tenant_id' => $staff->tenant_id,
                ]);

                $staff->user()->associate($user->id);
                $staff->save();
            });
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Staff;
use App\Models\State;
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

        $tenants = Tenant::all();
        $tenantIds = $tenants->pluck('id')->toArray(); // Array of tenant IDs [1,2,3,4,5,6,7,8,9,10]
        $countries = Country::all();
        $tenantCodes = $tenants->pluck('short_code');
        // Insert Admin User
        $admin = User::factory()->create([
            'name' => 'Herman Ceaser',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password')
        ]);

        DB::table('tenant_user')->insert([
            [
                'user_id' => $admin->id,
                'tenant_id' => 1,
            ],
            [
                'user_id' => $admin->id,
                'tenant_id' => 2,
            ]
        ]);

        $ctry = $countries->pluck('id')->random();

        $staff = Staff::factory()->create([
            'date_of_joining' => now()->subMonth(4),
            'employee_id' => $tenantCodes[0] . now()->format('y') . 'EMP-' . sprintf('%04d', 1),
            'user_id' => $admin->id,
            'email' => $admin->email,
            'first_name' => explode(' ', $admin->name)[0],
            'last_name' => explode(' ', $admin->name)[1],
            'department_id' => Department::where('tenant_id', 1)->get()->random()->id,
            'designation_id' => Designation::where('tenant_id', 1)->get()->random()->id,
            'country_id' => $ctry,
            'state_id' => State::where('country_id', $ctry)->pluck('id')->random(),
            'tenant_id' => 1,
        ]);


        foreach ($tenantIds as $key => $tenant) {

            $stafflist = Staff::factory()
                ->times(25)
                ->state(new Sequence(
                    function ($sequence) use ($tenantCodes, $tenant, $key, $countries) {
                        $index = $sequence->index + 1;
                        $country = $countries->pluck('id')->random();
                        return [
                            'country_id' => $country,
                            // 'state_id' => State::where('country_id', $country)->pluck('id')->random() ?? null,
                            'employee_id' => $tenantCodes[$key] . now()->subYear(1)->format('y') . 'EMP-' . sprintf('%04d', $index),
                            'department_id' => Department::where('tenant_id', $tenant)->get()->random()->id,
                            'designation_id' => Designation::where('tenant_id', $tenant)->get()->random()->id,
                            'tenant_id' => $tenant,

                        ];
                    },
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
                $staff->email = $user->email;
                $staff->first_name = explode(' ', $user->name)[0];
                $staff->last_name = explode(' ', $user->name)[1];
                $staff->save();
            });
        }
    }
}

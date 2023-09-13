<?php

use App\Models\Department;
use App\Models\Designation;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id')->unique();
            $table->foreignIdFor(User::class)->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Designation::class)->nullable()->setNullOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Department::class)->nullable()->setNullOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Tenant::class)->nullable()->cascadeOnUpdate()->index();
            $table->string('first_name')->fulltext();
            $table->string('last_name')->nullable()->fulltext();
            $table->date('dob')->nullable();
            $table->string('avatar')->nullable();
            $table->string('gender', 50);
            $table->string('next_of_kin')->nullable();
            $table->string('next_of_kin_number')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('emergency_contact_no')->nullable();
            $table->string('email')->nullable();
            $table->string('marital_status')->nullable();
            $table->timestamp('date_of_joining')->nullable();
            $table->timestamp('date_of_leaving')->nullable();
            $table->text('local_address')->nullable();
            $table->text('permanent_address')->nullable();
            $table->text('note')->nullable();
            $table->string('bank_account_no')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('ifsc_code')->nullable();
            $table->string('bank_branch')->nullable();
            $table->string('payscale')->nullable();
            $table->string('basic_salary')->nullable();
            $table->string('epf_no')->nullable();
            $table->boolean('is_active')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};

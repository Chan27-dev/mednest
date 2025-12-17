<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address_line_1');
            $table->string('city');
            $table->string('state');
            $table->string('zip_code');
            $table->foreignId('country_id')->constrained();
            $table->string('phone')->nullable();
            $table->string('operating_hours')->nullable()->default('Mon-Fri: 9am-5pm');
            $table->softDeletes();
        });

        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->onDelete('cascade');
            $table->foreignId('branch_id')->constrained();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('role')->comment('e.g., Doctor, Nurse, Admin, Midwife');
            $table->string('specialty')->nullable()->comment('e.g., OB-GYN, Pediatrics');
            $table->string('phone')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('staff_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_id')->constrained()->onDelete('cascade');
            $table->foreignId('branch_id')->constrained()->onDelete('cascade');
            $table->tinyInteger('day_of_week')->comment('0=Sunday, 1=Monday... 6=Saturday');
            $table->time('start_time');
            $table->time('end_time');
        });

        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->unique()->constrained()->onDelete('set null');
            $table->foreignId('branch_id')->nullable()->constrained('branches')->onDelete('set null');
            $table->string('first_name');
            $table->string('last_name');
            $table->date('date_of_birth');
            $table->enum('civil_status', ['Single','Married','Widowed','Separated','Live-in'])->nullable();
            $table->string('occupation')->nullable();
            $table->string('phone')->nullable()->index();
            $table->string('address')->nullable();
            $table->string('email')->nullable()->index();
            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_contact_phone')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patients');
        Schema::dropIfExists('staff_schedules');
        Schema::dropIfExists('staff');
        Schema::dropIfExists('branches');
    }
};
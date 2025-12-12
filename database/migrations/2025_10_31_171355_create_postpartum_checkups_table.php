<?php

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
        Schema::create('postpartum_checkups', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postpartum_checkups');
    }
};

/*
// Find the file named: ..._create_postpartum_checkups_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('postpartum_checkups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pregnancy_id')->constrained('pregnancies')->onDelete('cascade');
            $table->foreignId('staff_id')->constrained('staff');
            $table->foreignId('appointment_id')->nullable()->constrained('appointments')->onDelete('set null');
            $table->dateTime('checkup_date');
            $table->decimal('patient_weight_kg', 5, 2)->nullable();
            $table->string('blood_pressure', 20)->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->index('checkup_date');
        });
    }
    public function down(): void { Schema::dropIfExists('postpartum_checkups'); }
};
*/
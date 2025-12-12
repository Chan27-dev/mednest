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
        Schema::create('labor_monitorings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('labor_monitorings');
    }
};

/*
// Find the file named: ..._create_labor_monitorings_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('labor_monitorings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pregnancy_id')->constrained('pregnancies')->onDelete('cascade');
            $table->foreignId('appointment_id')->nullable()->constrained('appointments')->onDelete('set null');
            $table->foreignId('staff_id')->constrained('staff');
            $table->dateTime('monitoring_time');
            $table->integer('contractions_interval_minutes')->nullable();
            $table->decimal('cervical_dilation_cm', 3, 1)->nullable();
            $table->integer('fetal_heart_rate_bpm')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->index('monitoring_time');
        });
    }
    public function down(): void { Schema::dropIfExists('labor_monitorings'); }
};
*/
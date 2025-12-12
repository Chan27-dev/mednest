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
        Schema::create('lab_results', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lab_results');
    }
};

/*
// Find the file named: ..._create_lab_results_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('lab_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pregnancy_id')->nullable()->constrained('pregnancies')->onDelete('cascade');
            $table->foreignId('prenatal_checkup_id')->nullable()->constrained('prenatal_checkups')->onDelete('set null');
            $table->string('test_name');
            $table->text('result');
            $table->date('test_date');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('lab_results'); }
};
*/
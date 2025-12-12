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
        Schema::create('pregnancies', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pregnancies');
    }
};

/*
// Find the file named: ..._create_pregnancies_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('pregnancies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patients')->onDelete('cascade');
            $table->date('estimated_due_date');
            $table->string('status', 50)->default('active')->comment('active, completed, terminated');
            $table->string('outcome', 100)->nullable()->comment('e.g., live birth, stillbirth, miscarriage');
            $table->dateTime('delivery_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index(['status', 'outcome']);
        });
    }
    public function down(): void { Schema::dropIfExists('pregnancies'); }
};
*/
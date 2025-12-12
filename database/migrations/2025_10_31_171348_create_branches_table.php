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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};

/*
// Find the file named: ..._create_branches_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address_line_1');
            $table->string('city');
            $table->string('state');
            $table->string('zip_code', 20);
            $table->foreignId('country_id')->constrained('countries');
            $table->string('phone', 50)->nullable();
            $table->string('operating_hours')->nullable()->default('Mon-Fri: 9am-5pm');
            $table->softDeletes();
        });
    }
    public function down(): void { Schema::dropIfExists('branches'); }
};
*/
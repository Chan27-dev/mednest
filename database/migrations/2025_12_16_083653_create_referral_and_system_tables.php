<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hospitals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address_line_1');
            $table->string('city');
            $table->string('state');
            $table->string('zip_code');
            $table->foreignId('country_id')->constrained();
            $table->string('phone')->nullable();
            $table->boolean('is_partnered')->default(true);
            $table->softDeletes();
        });

        Schema::create('referrals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained()->onDelete('cascade');
            $table->foreignId('pregnancy_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('referring_staff_id')->constrained('staff');
            $table->foreignId('hospital_id')->constrained('hospitals');
            $table->text('reason');
            $table->dateTime('referral_date');
            $table->string('status')->default('pending')->comment('pending, referred, completed, rejected');
            $table->date('philhealth_submission_date')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->string('group')->nullable()->index();
        });

        Schema::create('audit_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->string('action');
            $table->string('model');
            $table->unsignedBigInteger('model_id');
            $table->json('changes')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('audit_logs');
        Schema::dropIfExists('settings');
        Schema::dropIfExists('referrals');
        Schema::dropIfExists('hospitals');
    }
};
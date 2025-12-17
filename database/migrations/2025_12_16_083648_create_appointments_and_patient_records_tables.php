<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Appointments
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained()->onDelete('cascade');
            $table->foreignId('staff_id')->nullable()->constrained('staff');
            $table->foreignId('branch_id')->constrained('branches');
            $table->foreignId('service_id')->constrained('services');
            $table->foreignId('order_id')->nullable()->constrained()->onDelete('set null');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->string('status')->default('scheduled');
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            $table->index(['patient_id', 'branch_id']);
        });

        // 2. Medical History
        Schema::create('patient_medical_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained()->onDelete('cascade');
            $table->string('condition');
            $table->text('notes')->nullable();
            $table->date('diagnosed_at')->nullable();
            $table->timestamps();
        });

        // 3. Pregnancies
        Schema::create('pregnancies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained()->onDelete('cascade');
            $table->date('estimated_due_date');
            $table->string('status')->default('active');
            $table->string('outcome')->nullable();
            $table->dateTime('delivery_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // 4. Prenatal Checkups
        Schema::create('prenatal_checkups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pregnancy_id')->constrained()->onDelete('cascade');
            $table->foreignId('staff_id')->constrained('staff');
            $table->foreignId('appointment_id')->nullable()->constrained()->onDelete('set null');
            $table->dateTime('checkup_date');
            $table->decimal('patient_weight_kg', 5, 2)->nullable();
            $table->string('blood_pressure')->nullable();
            $table->integer('fetal_heart_rate_bpm')->nullable();
            $table->text('notes')->nullable();
            $table->date('lmp')->nullable();
            $table->string('blood_type')->nullable();
            $table->timestamps();
        });

        // 5. Postpartum Checkups
        Schema::create('postpartum_checkups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pregnancy_id')->constrained()->onDelete('cascade');
            $table->foreignId('staff_id')->constrained('staff');
            $table->foreignId('appointment_id')->nullable()->constrained()->onDelete('set null');
            $table->dateTime('checkup_date');
            $table->decimal('patient_weight_kg', 5, 2)->nullable();
            $table->string('blood_pressure')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        // 6. Lab Results
        Schema::create('lab_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pregnancy_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('prenatal_checkup_id')->nullable()->constrained()->onDelete('set null');
            $table->string('test_name');
            $table->text('result');
            $table->date('test_date');
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        // 7. Immunizations
        Schema::create('immunizations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained()->onDelete('cascade');
            $table->string('vaccine_name');
            $table->string('dose')->nullable();
            $table->date('administration_date');
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        // 8. Newborns
        Schema::create('newborns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pregnancy_id')->constrained()->onDelete('cascade');
            $table->decimal('birth_weight_kg', 5, 2)->nullable();
            $table->integer('apgar_score')->nullable();
            $table->text('health_notes')->nullable();
            $table->timestamps();
        });

        // 9. Labor Monitoring
        Schema::create('labor_monitorings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pregnancy_id')->constrained()->onDelete('cascade');
            $table->foreignId('appointment_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('staff_id')->constrained('staff');
            $table->dateTime('monitoring_time');
            $table->integer('contractions_interval_minutes')->nullable();
            $table->decimal('cervical_dilation_cm', 3, 1)->nullable();
            $table->integer('fetal_heart_rate_bpm')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('labor_monitorings');
        Schema::dropIfExists('newborns');
        Schema::dropIfExists('immunizations');
        Schema::dropIfExists('lab_results');
        Schema::dropIfExists('postpartum_checkups');
        Schema::dropIfExists('prenatal_checkups');
        Schema::dropIfExists('pregnancies');
        Schema::dropIfExists('patient_medical_history');
        Schema::dropIfExists('appointments');
    }
};
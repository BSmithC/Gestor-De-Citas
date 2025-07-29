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
        Schema::create('medical_histories', function (Blueprint $table) {
            $table->id();
            $table->string('diagnosis');
            $table->string('reason');
            $table->string('symptoms');
            $table->string('diagnosis_description');
            $table->string('description');
            $table->string('blood_pressure');
            $table->string('temperature');
            $table->string('weight');
            $table->string('heart_rate');
            $table->string('observation');
            $table->foreignId('drug_id');
            $table->foreignId('patient_id');
            $table->foreignId('doctor_id');
            // $table->foreignId('patient_id')->constrained('pacient')->onDelete('cascade');
            // $table->foreignId('patient_id')->nullable()->constrained('pacient')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_histories');
    }
};

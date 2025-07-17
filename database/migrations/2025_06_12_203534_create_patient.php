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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('DNI');
            $table->string('name');
            $table->string('sur_name');
            $table->string('last_name');
            $table->string('second_sur_name');
            $table->date('date_of_birth');
            $table->string('phone_number');
            $table->string('nacionality');
            $table->string('address');
            $table->string('gender');
            $table->string('sex');
            $table->string('marital_status');
            $table->string('ocupation');
            $table->string('place_of_birth');
            $table->string('blood_type');
            $table->string('insurance');
            $table->boolean('status');
            $table->string('email')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
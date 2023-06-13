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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('applied_as'); //1 -> consultant 2 -> investor
            $table->string('fullname');
            $table->string('image');
            $table->string('email');
            $table->string('speciality');
            $table->string('phone');
            $table->string('location');
            $table->string('company');
            $table->string('dob')->nullable();
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};

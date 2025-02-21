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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');    // Student's first name
            $table->string('last_name');     // Student's last name
            $table->string('email')->unique(); // Unique email address
            $table->string('phone')->nullable(); // Optional phone number
            $table->date('date_of_birth')->nullable(); // Optional date of birth
            // Foreign key linking to a class (nullable if not yet assigned)
            $table->unsignedBigInteger('classes_id')->nullable();
            // $table->foreign('class_section_id')
            $table->foreign('classes_id')
                  ->references('id')->on('classes')
                  ->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};

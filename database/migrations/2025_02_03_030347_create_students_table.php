<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('sex', ['Male', 'Female', 'Other']);
            $table->date('dob');
            $table->text('address');
            $table->string('email')->unique();
            $table->string('mobile_no');
            $table->string('lrn')->unique();
            $table->string('class');
            $table->string('section');
            $table->string('password');
            $table->string('fathers_name');
            $table->string('mothers_name');
            $table->string('guardians_name');
            $table->string('emergency_contact_no');
            $table->string('role')->default('student');
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

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
        Schema::create('members', function (Blueprint $table) {
        $table->id(); 
        $table->string('name'); 
        $table->string('email')->unique(); 
        $table->string('phone')->nullable(); 
        $table->text('address')->nullable(); 
        $table->string('membership_type'); 
        $table->date('joining_date'); 
        $table->date('expiration_date')->nullable(); 
        $table->decimal('membership_fees', 8, 2)->nullable(); 
        $table->string('membership_status'); 
        $table->date('dob')->nullable(); 
        $table->enum('gender', ['Male', 'Female', 'Other'])->nullable(); 
        $table->string('profile_picture')->nullable(); 
        $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};

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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('task_name');
            $table->string('description'); // Fixed case of 'Description'
            $table->date('schedule_date');
            $table->string('priority');
            $table->unsignedBigInteger('assigned_to'); 
            $table->timestamps();

            // Adding foreign key constraint and index
            $table->foreign('assigned_to')->references('id')->on('users')->onDelete('cascade');
            $table->index('assigned_to'); // Index for optimized lookup
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};


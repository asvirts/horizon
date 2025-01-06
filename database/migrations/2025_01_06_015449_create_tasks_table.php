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
            $table->timestamps();
            $table->string('title');
            $table->date('due_date')->nullable();
            $table->string('status')->nullable();
            $table->string('priority')->nullable();
            $table->string('category')->nullable();
            $table->string('assignee')->nullable();
            $table->string('reporter')->nullable();
            $table->string('project')->nullable();
            $table->boolean('is_completed')->default(false);
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

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
        Schema::create('job_basic_abilities', function (Blueprint $table) {
            $table->id();
            $table->integer('job_id')->nullable();
            $table->integer('basic_ability_id')->nullable();
            $table->softDeletes(); // This adds the 'deleted_at' column
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_basic_abilities');
    }
};

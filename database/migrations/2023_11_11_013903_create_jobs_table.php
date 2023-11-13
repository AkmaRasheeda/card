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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('media_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('type_id')->nullable();
            $table->text('description')->nullable();
            $table->text('detail')->nullable();

            $table->string('business_skill')->nullable();
            $table->string('knowledge')->nullable();
            $table->text('location')->nullable();
            $table->string('activity')->nullable();

            $table->boolean('academic_degree_doctor')->nullable();
            $table->boolean('academic_degree_master')->nullable();
            $table->boolean('academic_degree_professional')->nullable();
            $table->boolean('academic_degree_bachelor')->nullable();

            $table->string('statistic_group')->nullable();
            $table->integer('salary_range_first_year')->nullable();
            $table->integer('salary_range_average')->nullable();
            $table->text('salary_range_remarks')->nullable();
            $table->text('retriction')->nullable();
            $table->integer('estimated_total_workers')->nullable();
            $table->text('remarks')->nullable();

            $table->string('url')->nullable();
            $table->text('seo_description')->nullable();
            $table->string('seo_keywords')->nullable();
            $table->integer('sort_order')->nullable();
            $table->string('publish_status')->nullable();
            $table->string('version')->nullable();
            $table->integer('created_by')->nullable();

            $table->softDeletes(); // This adds the 'deleted_at' column
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};

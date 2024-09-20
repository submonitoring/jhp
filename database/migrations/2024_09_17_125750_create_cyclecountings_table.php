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
        Schema::create('cyclecountings', function (Blueprint $table) {
            $table->id();
            $table->string('cycle_counting', 1)
                ->nullable()
                ->unique();
            $table->string('cycle_counting_desc')->nullable();
            $table->string('number_per_year', 3)->nullable();
            $table->boolean('is_active')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();

            $table->timestamps();
        });

        Schema::create('cyclecounting_plant', function (Blueprint $table) {
            $table->foreignId('plant_id')->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('cyclecounting_id')->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cyclecountings');
    }
};

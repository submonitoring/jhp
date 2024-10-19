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
        Schema::create('materialplants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('materialmaster_id')->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('plant_id')->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('loadinggroup_id')->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('transportationgroup_id')->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('periodindicator_id')->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('procurementtype_id')->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('specialprocurementtype_id')->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->decimal('safety_stock', 13, 3)->nullable();
            $table->decimal('minimal_safety_stock', 13, 3)->nullable();
            $table->string('slug')->nullable();
            $table->boolean('is_batch')->nullable();
            $table->boolean('is_active')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();

            $table->timestamps();
        });

        Schema::create('materialmasterables', function (Blueprint $table) {
            $table->unsignedBigInteger('materialmaster_id');
            $table->unsignedBigInteger('materialmasterable_id');
            $table->string('materialmasterable_type');

            $table->index('materialmasterable_id');
            $table->index('materialmasterable_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materialplants');
    }
};

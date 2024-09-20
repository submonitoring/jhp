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
        Schema::create('materialmasters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('numberrange_id')->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->string('material_number', 10)
                ->nullable()
                ->unique();
            $table->string('material_desc')->nullable();
            $table->string('old_material_number')->nullable();
            $table->foreignId('materialtype_id')->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('industrysector_id')->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('materialgroup_id')->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('itemcategorygroup_id')->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('base_uom')->nullable()
                ->references('id')
                ->on('uoms')
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('weight_unit')->nullable()
                ->references('id')
                ->on('uoms')
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->string('gross_weight', 3)->nullable();
            $table->string('net_weight', 3)->nullable();
            $table->boolean('deletion_flag')->nullable();
            $table->boolean('is_active')->nullable();
            $table->boolean('is_external')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materialmasters');
    }
};

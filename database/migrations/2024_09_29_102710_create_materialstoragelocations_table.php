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
        Schema::create('materialstoragelocations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('materialmaster_id')->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('plant_id')->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('storagelocation_id')->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('storagecondition_id')->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('temperaturecondition_id')->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->string('slug')->nullable();
            $table->boolean('is_active')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();

            $table->timestamps();
        });

        Schema::create('materialplantables', function (Blueprint $table) {
            $table->unsignedBigInteger('materialplant_id');
            $table->unsignedBigInteger('materialplantable_id');
            $table->string('materialplantable_type');

            $table->index('materialplantable_id');
            $table->index('materialplantable_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materialstoragelocations');
    }
};

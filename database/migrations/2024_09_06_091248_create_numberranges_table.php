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
        Schema::create('numberranges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nrobject_id')->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->string('nr_interval', 4)
                ->nullable()
                ->unique();
            $table->string('con')
                ->nullable()
                ->unique();
            $table->string('year', 4)->nullable();
            $table->decimal('number', 10, 0)->nullable();
            $table->decimal('current_number', 10, 0)->nullable();
            $table->boolean('is_external')->nullable();
            $table->boolean('is_active')->nullable();
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
        Schema::dropIfExists('numberranges');
    }
};

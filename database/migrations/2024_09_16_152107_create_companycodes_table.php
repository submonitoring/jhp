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
        Schema::create('companycodes', function (Blueprint $table) {
            $table->id();
            $table->string('company_code', 4)
                ->nullable()
                ->unique();
            $table->string('company_code_name')->nullable();
            $table->string('vat_number')
                ->nullable()
                ->unique();
            $table->foreignId('currency_id')->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->boolean('is_active')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();

            $table->timestamps();
        });

        Schema::create('addressables', function (Blueprint $table) {
            $table->unsignedBigInteger('address_id');
            $table->unsignedBigInteger('addressable_id');
            $table->string('addressable_type');

            $table->index('addressable_id');
            $table->index('addressable_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companycodes');
    }
};

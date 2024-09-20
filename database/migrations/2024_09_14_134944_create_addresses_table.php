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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('numberrange_id')->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->string('address_number', 10)
                ->nullable()
                ->unique();
            $table->foreignId('country_id')->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('provinsi_id')->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('kabupaten_id')->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('kecamatan_id')->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('kelurahan_id')->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('kodepos_id')->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->text('alamat')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('name_1', 40)->nullable();
            $table->string('name_2', 40)->nullable();
            $table->string('name_3', 40)->nullable();
            $table->string('name_4', 40)->nullable();
            $table->string('city', 40)->nullable();
            $table->string('district', 40)->nullable();
            $table->string('country', 40)->nullable();
            $table->string('postal_code', 10)->nullable();
            $table->string('region')
                ->default('40')
                ->nullable();
            $table->string('po_box', 10)->nullable();
            $table->text('street')->nullable();
            $table->string('street_2', 40)->nullable();
            $table->string('street_3', 40)->nullable();
            $table->string('street_4', 40)->nullable();
            $table->string('street_5', 40)->nullable();
            $table->string('building_number', 20)->nullable();
            $table->string('floor', 10)->nullable();
            $table->string('room', 10)->nullable();
            $table->string('telephone_number_1', 30)->nullable();
            $table->string('telephone_number_1_ext', 10)->nullable();
            $table->string('telephone_number_2', 30)->nullable();
            $table->string('telephone_number_2_ext', 10)->nullable();
            $table->string('fax_number_1', 30)->nullable();
            $table->string('fax_number_1_ext', 10)->nullable();
            $table->string('fax_number_2', 30)->nullable();
            $table->string('fax_number_2_ext', 10)->nullable();
            $table->string('handphone_number_1', 30)->nullable();
            $table->string('handphone_number_2', 30)->nullable();
            $table->string('email')->nullable();
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
        Schema::dropIfExists('addresses');
    }
};

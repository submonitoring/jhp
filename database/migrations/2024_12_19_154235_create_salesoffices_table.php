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
        Schema::create('salesoffices', function (Blueprint $table) {
            $table->id();
            $table->string('sales_office', 4)->nullable();
            $table->string('sales_office_name')->nullable();
            $table->boolean('is_active')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();


            $table->timestamps();
        });

        Schema::create('salesarea_salesoffice', function (Blueprint $table) {
            $table->unsignedBigInteger('salesarea_id');
            $table->unsignedBigInteger('salesoffice_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salesoffices');
        Schema::dropIfExists('salesarea_salesoffice');
    }
};

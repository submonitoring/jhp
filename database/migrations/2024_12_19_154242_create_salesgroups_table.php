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
        Schema::create('salesgroups', function (Blueprint $table) {
            $table->id();
            $table->string('sales_group', 4)->nullable();
            $table->string('sales_group_name')->nullable();
            $table->boolean('is_active')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();

            $table->timestamps();
        });

        Schema::create('salesgroup_salesoffice', function (Blueprint $table) {
            $table->unsignedBigInteger('salesoffice_id');
            $table->unsignedBigInteger('salesgroup_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salesgroups');
        Schema::dropIfExists('salesgroup_salesoffice');
    }
};

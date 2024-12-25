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
        Schema::create('distributionchannels', function (Blueprint $table) {
            $table->id();
            $table->string('distribution_channel', 2)->nullable();
            $table->string('distribution_channel_name')->nullable();
            $table->boolean('is_active')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();

            $table->timestamps();
        });

        Schema::create('distributionchannel_salesorganization', function (
            Blueprint $table
        ) {
            $table->unsignedBigInteger('salesorganization_id');
            $table->unsignedBigInteger('distributionchannel_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distributionchannels');
        Schema::dropIfExists('distributionchannel_salesorganization');
    }
};

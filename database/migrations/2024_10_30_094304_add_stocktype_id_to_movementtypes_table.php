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
        Schema::table('movementtypes', function (Blueprint $table) {
            $table->foreignId('stocktype_id')->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete()
                ->after('reasonformovementcontrol_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('movementtypes', function (Blueprint $table) {
            //
        });
    }
};

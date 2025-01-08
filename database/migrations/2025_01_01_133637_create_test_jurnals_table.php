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
        Schema::create('test_jurnals', function (Blueprint $table) {
            $table->id();
            $table->date('document_date')->nullable();
            $table->date('posting_date')->nullable();
            $table->string('document_number')->nullable();
            $table->string('item_number')->nullable();
            $table->string('materal_number')->nullable();
            $table->string('debitcredit')->nullable();
            $table->string('gl_account')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('amount');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_jurnals');
    }
};

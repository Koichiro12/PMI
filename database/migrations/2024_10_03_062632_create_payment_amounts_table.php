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
        Schema::create('payment_amounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('biodata_id');
            $table->unsignedBigInteger(column: 'payment_categories_id');
            $table->string('amount')->default(0)->nullable();
            $table->text('note')->default(0)->nullable();
            $table->timestamps();

            $table->foreign('biodata_id')->references('id')->on('biodata')->onDelete('cascade');
            $table->foreign('payment_categories_id')->references('id')->on('payment_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_amounts');
    }
};

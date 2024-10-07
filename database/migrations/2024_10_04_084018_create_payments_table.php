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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('biodata_id');
            $table->unsignedBigInteger('payment_categories_id');
            $table->string('payment')->default(0);
            $table->string('type_payment');
            $table->string('bukti')->nullable();
            $table->text('note')->nullable();
            $table->string('payment_status')->default(1);
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
        Schema::dropIfExists('payments');
    }
};

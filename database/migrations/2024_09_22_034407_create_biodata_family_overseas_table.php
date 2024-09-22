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
        Schema::create('biodata_family_overseas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('biodata_id');
            $table->string('name');
            $table->string('relasi');
            $table->text('lokasi');
            $table->timestamps();
            $table->foreign('biodata_id')->references('id')->on('biodata')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biodata_family_overseas');
    }
};

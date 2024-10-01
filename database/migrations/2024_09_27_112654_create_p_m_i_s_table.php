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
        Schema::create('pmi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('biodata_id');
            $table->string('nik');
            $table->string('nama');
            $table->string('umur');
            $table->string('jenis_kelamin');
            $table->text('asal');
            $table->string('paspor');
            $table->string('visa');
            $table->string('pk_number');
            $table->timestamps();
            
            $table->foreign('biodata_id')->references('id')->on('biodata')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pmi');
    }
};

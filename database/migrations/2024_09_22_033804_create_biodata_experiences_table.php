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
        Schema::create('biodata_experiences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('biodata_id');
            $table->string('type_pekerjaan');
            $table->string('masa_kerja');
            $table->string('wilayah_kerja');
            $table->text('desc_pekerjaan');
            $table->timestamps();
            
            $table->foreign('biodata_id')->references('id')->on('biodata')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biodata_experiences');
    }
};

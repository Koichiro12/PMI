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
        Schema::create('pmi_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(column: 'pmi_id');
            $table->unsignedBigInteger(column: 'file_categories_id');
            $table->text('file');
            $table->timestamps();
            $table->foreign(columns: 'file_categories_id')->references('id')->on('file_categories')->onDelete('cascade');
            $table->foreign('pmi_id')->references('id')->on('pmi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pmi_files');
    }
};

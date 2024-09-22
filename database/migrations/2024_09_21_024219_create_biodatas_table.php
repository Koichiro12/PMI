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
        Schema::create('biodata', function (Blueprint $table) {
            $table->id();
            $table->string('kode_biodata');
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('jenis_kelamin');
            $table->integer('umur');
            $table->integer('tb');
            $table->integer('bb');
            $table->string('agama');
            $table->string('kewarganegaraan');
            $table->string('pendidikan');
            $table->string('bahasa');
            $table->string('status_pernikahan');
            $table->integer('status_ayah')->default(0);
            $table->integer('umur_ayah')->default(0);
            $table->integer('status_ibu')->default(0);
            $table->integer('umur_ibu')->default(0);
            $table->integer('jumlah_saudara');
            $table->integer('kakak_laki_laki');
            $table->integer('kakak_perempuan');
            $table->integer('adik_laki_laki');
            $table->integer('adik_perempuan');
            $table->integer('anak_ke');
            $table->string('nama_suami');
            $table->string('karir_suami');
            $table->integer('jml_anak')->default(0);
            $table->integer('jml_anak_laki_laki')->default(0);
            $table->string('umur_anak_laki_laki')->default('');
            $table->integer('jml_anak_perempuan')->default(0);
            $table->string('umur_anak_perempuan')->default('');
            $table->string('family_in_taiwan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biodata');
    }
};

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
            $table->text('foto');
            $table->string('nik')->nullable();
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('jenis_kelamin');
            $table->text('asal')->nullable();
            $table->integer('umur')->default(0);
            $table->integer('tb')->default(0);
            $table->integer('bb')->default(0);
            $table->string('agama');
            $table->string('kewarganegaraan')->default('WNI');
            $table->string('pendidikan')->default('-');
            $table->string('bahasa')->default('Indonesia');
            $table->string('status_pernikahan')->nullable();
            $table->integer('status_ayah')->default(0);
            $table->integer('umur_ayah')->default(0);
            $table->integer('status_ibu')->default(0);
            $table->integer('umur_ibu')->default(0);
            $table->integer('jumlah_saudara')->default(0);
            $table->integer('kakak_laki_laki')->default(0);
            $table->integer('kakak_perempuan')->default(0);
            $table->integer('adik_laki_laki')->default(0);
            $table->integer('adik_perempuan')->default(0);
            $table->integer('anak_ke')->default(1);
            $table->string('nama_suami')->default('-');
            $table->string('karir_suami')->default('-');
            $table->integer('jml_anak')->default(0);
            $table->integer('jml_anak_laki_laki')->default(0);
            $table->string('umur_anak_laki_laki')->nullable();
            $table->integer('jml_anak_perempuan')->default(0);
            $table->string('umur_anak_perempuan')->nullable();
            $table->string('family_in_taiwan')->default(0);
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

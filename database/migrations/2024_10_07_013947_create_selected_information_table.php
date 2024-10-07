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
        Schema::create('selected_information', function (Blueprint $table) {
            $table->id();
            $table->string('job_order_no');
            $table->string('nomor_paspor');
            $table->string('nama_tionghoa');
            $table->string('nama_inggris');
            $table->string('tma');
            $table->string('pemberi_kerja');
            $table->string('rekanan_perekrutan');
            $table->string('progress_staff_asing');
            $table->string('staff_pemasaran');
            $table->string('luar_negeri');
            $table->string('kategori');
            $table->string('sekolah');
            $table->string('nomor_referensi');
            $table->string('tanggal_terpilih_start');
            $table->string('tanggal_terpilih_end');
            $table->string('penempatan_aktual_start');
            $table->string('penempatan_aktual_end');
            $table->string('nomor_seri');
            $table->string('penempatan_aktual');
            $table->string('jenis_pekerjaan');
            $table->string('diproses');
            $table->string('kembali');
            $table->string('dibatalkan');
            $table->string('ditempatkan');
            $table->string('tampilkan_semua_progress');
            $table->string('prioritas_dan_ubah_backup_keprioritas');
            $table->string('cadangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('selected_information');
    }
};

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
            $table->string('job_order_no')->nullable();
            $table->string('nomor_paspor')->nullable();
            $table->string('nama_tionghoa')->nullable();
            $table->string('nama_inggris')->nullable();
            $table->string('tma')->nullable();
            $table->string('pemberi_kerja')->nullable();
            $table->string('rekanan_perekrutan')->nullable();
            $table->string('progress_staff_asing')->nullable();
            $table->string('staff_pemasaran')->nullable();
            $table->string('luar_negeri')->nullable();
            $table->string('kategori')->nullable();
            $table->string('kategori_pekerjaan')->nullable();
            $table->string('sekolah')->nullable();
            $table->string('nomor_referensi')->nullable();
            $table->string('tanggal_terpilih_start')->nullable();
            $table->string('tanggal_terpilih_end')->nullable();
            $table->string('penempatan_aktual_start')->nullable();
            $table->string('penempatan_aktual_end')->nullable();
            $table->string('tgl_mulai')->nullable();
            $table->string('tgl_selesai')->nullable();
            $table->string('nomor_seri')->nullable();
            $table->string('penempatan_aktual')->nullable();
            $table->string('jenis_pekerjaan')->nullable();
            $table->string('diproses')->nullable();
            $table->string('kembali')->nullable();
            $table->string('dibatalkan')->nullable();
            $table->string('ditempatkan')->nullable();
            $table->string('tampilkan_semua_progress')->nullable();
            $table->string('prioritas_dan_ubah_backup_keprioritas')->nullable();
            $table->string('cadangan')->nullable();
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

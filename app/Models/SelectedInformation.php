<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelectedInformation extends AppModel
{
    use HasFactory;
    protected $table = 'selected_information';

    protected $fillable = [
       'job_order_no',
           'nomor_paspor',
           'nama_tionghoa',
           'nama_inggris',
           'tma',
           'pemberi_kerja',
           'rekanan_perekrutan',
           'progress_staff_asing',
           'staff_pemasaran',
           'luar_negeri',
           'kategori',
           'sekolah',
           'nomor_referensi',
           'tanggal_terpilih_start',
           'tanggal_terpilih_end',
           'penempatan_aktual_start',
           'penempatan_aktual_end',
           'nomor_seri',
           'penempatan_aktual',
           'jenis_pekerjaan',
           'diproses',
           'kembali',
           'dibatalkan',
           'ditempatkan',
           'tampilkan_semua_progress',
           'prioritas_dan_ubah_backup_keprioritas',
           'cadangan',
    ];

}

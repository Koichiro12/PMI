<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends AppModel
{
    use HasFactory;
    protected $fillable = [
        'kode_biodata',
        'foto',
        'nik',
        'asal',
        'nama',
        'tempat_lahir',
        'tgl_lahir',
        'jenis_kelamin',
        'umur',
        'tb',
        'bb',
        'agama',
        'kewarganegaraan',
        'pendidikan',
        'bahasa',
        'status_pernikahan',
        'status_ayah',
        'umur_ayah',
        'status_ibu',
        'umur_ibu',
        'jumlah_saudara',
        'kakak_laki_laki',
        'kakak_perempuan',
        'adik_laki_laki',
        'adik_perempuan',
        'anak_ke',
        'nama_suami',
        'karir_suami',
        'jml_anak',
        'jml_anak_laki_laki',
        'umur_anak_laki_laki',
        'jml_anak_perempuan',
        'umur_anak_perempuan',
        'family_in_taiwan',
    ];
    protected $table = 'biodata';


    public function BiodataExperiences(){
        return $this->hasMany(BiodataExperience::class);
    }
    public function BiodataFamilyOverseas(){
        return $this->hasMany(BiodataFamilyOverseas::class);
    }
    public function PMI(){
        return $this->hasOne(PMI::class);
    }
 
    public function Payment(){
        return $this->hasMany(Payment::class);
    }

    public function PaymentAmount(){
        return $this->hasMany(PaymentAmount::class);
    }

    public function BiodataAnswers(){
        return $this->hasMany(BiodataAnswers::class);
    }

}

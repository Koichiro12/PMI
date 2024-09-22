<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiodataExperience extends AppModel
{
    use HasFactory;
    protected $fillable = [
        'biodata_id',
        'type_pekerjaan',
        'masa_kerja',
        'wilayah_kerja',
        'desc_pekerjaan',

    ];
    protected $table = 'biodata_experiences';


    public function Biodata(){
        return $this->belongsTo(Biodata::class,'biodata_id');
    }
}

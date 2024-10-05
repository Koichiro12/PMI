<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PMI extends AppModel
{
    use HasFactory;

    protected $table = 'pmi';
    protected $fillable = [
        'biodata_id',
        'nik',
        'nama',
        'umur',
        'jenis_kelamin',
        'asal',
        'paspor',
        'visa',
        'pk_number',
    ];

    public function Biodata(){
        return $this->belongsTo(Biodata::class,'biodata_id');
    }

    public function PMIFiles(){
        return $this->hasMany(PMIFiles::class,'pmi_id');
    }
    

}

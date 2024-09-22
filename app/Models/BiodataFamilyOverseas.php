<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiodataFamilyOverseas extends AppModel
{
    use HasFactory;
    protected $fillable = [
       'biodata_id',
       'name',
      'relasi',
        'lokasi',
    ];
    protected $table = 'biodata_family_overseas';
    public function Biodata(){
        return $this->belongsTo(Biodata::class,'biodata_id');
    }
}

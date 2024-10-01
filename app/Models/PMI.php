<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PMI extends Model
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

}
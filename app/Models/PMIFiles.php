<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PMIFiles extends Model
{
    use HasFactory;
    protected $table = 'pmi_files';
    protected $fillable = [
        'pmi_id',
        'file_categories_id',
        'file',
    ];
}

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


    public function PMI(){
        return $this->belongsTo(PMI::class);
    }
    public function FileCategory(){
        return $this->belongsTo(FileCategory::class);
    }

}

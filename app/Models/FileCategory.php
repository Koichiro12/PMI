<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileCategory extends AppModel
{
    use HasFactory;

    protected $table = 'file_categories';
    protected $fillable = [
        'category_files',
        'category_status'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Options extends Model
{
    use HasFactory;

    protected $table = 'options';
    protected $fillable = [
        'questions_id',
        'option_text',
    ];

    public function Questions(){
        return $this->belongsTo(Questions::class,'questions_id');
    }

}

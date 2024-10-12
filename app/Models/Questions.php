<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends AppModel
{
    use HasFactory;

    protected $table = 'questions';
    protected $fillable = [
        'type_question',
        'question',
    ];


    public function Options(){
        return $this->hasMany(Options::class);
    }

    public function BiodataAnswers(){
        return $this->hasMany(BiodataAnswers::class);
    }

}

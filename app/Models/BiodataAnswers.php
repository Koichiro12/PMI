<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiodataAnswers extends AppModel
{
    use HasFactory;

    protected $table = 'biodata_answers';
    protected $fillable = [
        'biodata_id',
        'questions_id',
        'answer',
        'custom_answer'
    ];

    public function Biodata(){
        return $this->belongsTo(Biodata::class);
    }
    public function Questions(){
        return $this->belongsTo(Questions::class);
    }

}

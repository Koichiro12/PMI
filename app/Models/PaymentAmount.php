<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentAmount extends AppModel
{
    use HasFactory;
    protected $table = 'payment_amounts';
    protected $fillable = [
        'biodata_id',
        'payment_categories_id',
        'amount',
        'note'
    ];

    public function Biodata(){
        return $this->belongsTo(Biodata::class,'biodata_id');
    }
    public function PaymentCategory(){
        return $this->belongsTo(PaymentCategory::class,'payment_categories_id');
    }
}

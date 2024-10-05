<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends AppModel
{
    use HasFactory;
    protected $table = 'payments';

    protected $fillable = [
        'biodata_id',
        'payment_categories_id',
        'type_payment',
        'payment',
        'bukti',
        'note',
        'payment_status',
        'created_at',
        'update_at'
    ];


    public function Biodata(){
        return $this->belongsTo(Biodata::class,'biodata_id');
    }
    public function PaymentCategory(){
        return $this->belongsTo(PaymentCategory::class,'payment_categories_id');
    }

}

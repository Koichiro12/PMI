<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentCategory extends AppModel
{
    use HasFactory;

    protected $table = 'payment_categories';
    protected $fillable = [
        'payment_category',
        'payment_category_status',
    ];

    public function PaymentAmount(){
        return $this->hasMany(PaymentAmount::class);
    }
    public function Payment(){
        return $this->hasMany(Payment::class);
    }

}

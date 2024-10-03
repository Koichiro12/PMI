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

    public function PMIFiles(){
        return $this->hasMany(PMIFiles::class);
    }

}

<?php

namespace App\Models\CRM;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Customerpayment extends Model
{
    use HasFactory;



    protected $table = 'customer_payment';
    protected $fillable = [
        'customer_id',
        'amount',
        'payment_mode',
        'payment_date',
        'screenshot',
        'rejection_reason',
        'status',
        'utr'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }
    


}
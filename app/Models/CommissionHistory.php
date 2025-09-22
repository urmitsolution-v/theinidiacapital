<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommissionHistory extends Model
{
   use HasFactory;

    protected $fillable = [
        'referrer_id',
        'user_id',
        'invest_id',
        'amount',
        'month',
    ];


    protected $table = 'commission_histories';


    public function referrer()
    {
        return $this->belongsTo(User::class, 'referrer_id');
    }

    public function investor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function invest()
    {
        return $this->belongsTo(Invest::class, 'invest_id');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invest extends Model
{
    use HasFactory;

    protected $table = 'invested';
    protected $fillable = [
        'userid',
        'package_id',
        'amount',
        'firstminus',
        'time',
        'interest',
        'start_time',
        'earned_amount',
        'earnings_per_second',
        'completestatus',
        'admin_added',
        'type',
        'status'
    ];
    


    public function package()
    {
        return $this->belongsTo(Pakeges::class, 'package_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userid', 'id');
    }
    
public function customRates()
{
    return $this->hasMany(CustomInterestRate::class, 'invest_id');
}

public function pnlHistory()
{
    return $this->hasMany(Pnlhistory::class, 'invest');
}

    
}
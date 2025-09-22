<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    use HasFactory;

    protected $table = 'withdraw';
    protected $fillable = [
        'userid',
        'invest_id',
        'package_id',
        'amount_cut',
        'amount',
        'reason',
        'verify_time',
        'utr',
        'type',
        'remark',
        'status'
    ];



    public function user()
{
    return $this->belongsTo(User::class, 'userid');
}

// In your model
public function invest()
{
    return $this->belongsTo(Invest::class, 'invest_id');
}

public function package()
{
    return $this->belongsTo(Pakeges::class, 'package_id');
}

// // In your model
// public function package()
// {
//     return $this->belongsTo(package::class, 'package_id');
// }

    
}
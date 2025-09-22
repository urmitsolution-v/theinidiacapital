<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pnlhistory extends Model
{
    
    use HasFactory;

    protected $table = 'pnl_history';
    protected $fillable = [
        'userid',
        'amount',
        'trade_balance',
        'profit_amount',
        'percantage',
        'package_id',
        'invest',
    ];


    
    public function user()
{
    return $this->belongsTo(User::class, 'userid');
}

}
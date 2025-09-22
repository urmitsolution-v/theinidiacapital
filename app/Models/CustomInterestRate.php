<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomInterestRate extends Model
{
    use HasFactory;

    protected $table = 'custom_interest_rates';
    protected $fillable = [
        'userid',
        'invest_id',
        'original_interest_rate',
        'custom_interest_rate',
        'effective_date',
        'end_date',
        'status',
        'amount',
        'investment_amount',
        'notes'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    public function invest()
    {
        return $this->belongsTo(Invest::class, 'invest_id');
    }
}
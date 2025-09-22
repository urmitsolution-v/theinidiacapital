<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pakeges extends Model
{
    
    use HasFactory;

    protected $table = 'pakeges';
    protected $fillable = [
        'category',
        'currency',
        'formate',
        'benefit',
        'interest_rate',
        'clint_criteria',
        'deac',
        'ammount',
        'max_amount',
        'status',
        'ac_type',
    ];


    

}   
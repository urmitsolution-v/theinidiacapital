<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;
    protected $table = 'webinfo';
    protected $fillable = [
        'info_one',
        'info_two',
        'info_three',
        'image',
        'favicon',
        'image_2',
        'bank_address',
        'branch_name',
        'bank_name',
        'ifsc_code',
        'account_number',
        'account_holder_name',
    ];
}
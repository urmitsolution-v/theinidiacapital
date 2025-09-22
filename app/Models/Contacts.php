<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasFactory;


    protected $table = 'contacts';
    protected $fillable = [
        'name_title',
        'name',
        'accounts_name',
        'phone_type',
        'phone',
        'email',
        'address',
        'state',
        'city',
        'country',
        'zip_code',
        'date_of_birth',
        'status',
        'remarks',
        'description',
        'time_next_follow_up',
        'date_next_follow_up',
    ];

}

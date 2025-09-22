<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;


    protected $table = 'events';
    protected $fillable = [
        'title',
        'short_description',
        'image',
        'location',
        'date',
        'start_time',
        'end_time',
        'description',
        'meta_title',
        'meta_tags',
        'meta_description',
        'status',
    ];


}

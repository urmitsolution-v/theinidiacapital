<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bestourservice extends Model
{
    use HasFactory;

    protected $table = 'best_our_service';
    protected $fillable = [
        'title',
        'sub_title',
        'icon',
        'status',
    ];

}

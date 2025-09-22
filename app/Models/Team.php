<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $table = 'team';  // Table name (optional, Laravel assumes plural by default)
    protected $fillable = [
        'name',
        'image',
        'status'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagesetting extends Model
{
    use HasFactory;

    protected $table = 'pagesettings';
    protected $fillable = [
        'title',
        'pagename',
        'bradcump_title',
        'description',
        'meta',
        'tag',
        'meta_d',
        'image',
        'status',
    ];
}

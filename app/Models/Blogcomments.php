<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogcomments extends Model
{
    use HasFactory;

    protected $table = 'blogcomments';
    protected $fillable = [
        'blog_id',
        'name',
        'email',
        'message',
        'status',
    ];


}

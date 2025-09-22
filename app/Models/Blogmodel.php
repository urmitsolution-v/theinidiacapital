<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogmodel extends Model
{
    use HasFactory;

    protected $table = 'blogs';
    protected $fillable = [
        'title',
        'admin',
        'short_description',
        'banner',
        'description',
        'image',
        'category',
        'meta_title',
        'meta_tags',
        'meta_description',
        'status',
    ];
    public function get_Category()
    {
        return $this->belongsTo(Category::class, 'category');
    }
}

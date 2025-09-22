<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';
    protected $fillable = [
        'title',
        'category',
        'description',
        'long_description',
        'image',
        'baner_img',
        'icon',
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

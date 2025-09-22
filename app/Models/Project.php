<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';
    protected $fillable = [
        'project_name',
        'date',
        'loction',
        'category',
        'image',
        'client',
        'duration',
        'slug',
        // 'category',
        's_description',
        'l_description',
        's_description1',
        'l_description1',
        'image1',
        's_description2',
        'l_description2',
        'meta_title',
        'meta_tags',
        'meta_description',
        'status',
    ];
    public function get_Categorys()
    {
        return $this->belongsTo(Category::class, 'category');
    }
}

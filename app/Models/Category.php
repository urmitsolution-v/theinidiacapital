<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';
    protected $fillable = [
        'title',
        'type',
        'status',
    ];
    public function projects()
    {
        return $this->hasMany(Project::class);
    }


    public function category()
{
    return $this->belongsTo(Category::class, 'category', 'id');
}
}

<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'order',
    ];

    public function getNews()
    {
        return $this->hasMany(News::class, 'category_id', 'id');
    }

    public function getLimitContent()
    {
        return Str::limit($this->description, 100, '...');
    }
}

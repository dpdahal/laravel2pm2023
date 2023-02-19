<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'meta_title',
        'meta_description',
        'image',
        'intro_text',
        'description',
        'order',
        'is_published',
        'views',
    ];

    public function getLimitText()
    {
        return Str::limit($this->description, 100);
    }

    public function getCategory()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

}

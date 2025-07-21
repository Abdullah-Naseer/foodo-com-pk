<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
         'title',
        'category_id',
        'slug',
        'image',
        'content',
        'views',
        'tags',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'user_id',
         'deleted_by'
    ];

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected static function booted()
    {
        static::deleting(function ($blog) {
            $blog->deleted_by = auth()->id();
            $blog->save();
        });
    }


    public function deleteImage()
    {
        $relativePath = str_replace(url('/') . '/', '', $this->image);
        if ($this->image && file_exists($relativePath)) {
            unlink($relativePath);
        }
    }
}

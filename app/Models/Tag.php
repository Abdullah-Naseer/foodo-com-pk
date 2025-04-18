<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'slug'
    ];

    public function blogs()
    {
        return $this->morphedByMany(Blog::class, 'taggable');
    }

    protected static function booted()
    {
        static::deleting(function ($tag) {
            $tag->deleted_by = auth()->id();
            $tag->save();
        });
    }
}

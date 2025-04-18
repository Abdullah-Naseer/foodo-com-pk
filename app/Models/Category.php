<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{

    use SoftDeletes;
    protected $dates = ['deleted_at'];


    protected $fillable = [
        'name',
        'slug',
        'deleted_by'
    ];

 public function blogs(){
        return $this->hasMany(Blog::class);
    }

    protected static function booted()
    {
        static::deleting(function ($catgeory) {
            $catgeory->deleted_by = auth()->id();
            $catgeory->save();

            $catgeory->blogs()->each(function ($blog) {
                $blog->deleted_by = auth()->id();
                $blog->save();
                $blog->delete();
            });
        });
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title',
        'slug',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'view_path',
        'status',
        'deleted_by'
    ];

    public static $statuses = [
        'published' => 'Published',
        'draft'     => 'Draft',
    ];

    protected static function booted()
    {
        static::deleting(function ($page) {
            $page->deleted_by = auth()->id();
            $page->save();
        });
    }
}

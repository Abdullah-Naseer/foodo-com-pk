<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class MenuType extends Model
{

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = ['type', 'days_count'];

    public static $statuses = [
        'published' => 'Published',
        'draft'     => 'Draft',
    ];

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }

    protected static function booted()
    {
        static::deleting(function ($menuType) {
            $menuType->deleted_by = auth()->id();
            $menuType->save();

            $menuType->menus()->each(function ($menu) {
                $menu->deleted_by = auth()->id();
                $menu->save();
                $menu->delete();
            });
        });
    }
}

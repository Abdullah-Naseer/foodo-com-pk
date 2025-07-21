<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MealPlan extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = ['menu_type_id', 'customer_id', 'persons', 'delivery_address', 'start_date', 'phone', 'company' ,'status'];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function menuType()
    {
        return $this->belongsTo(MenuType::class);
    }

    public function menuItems()
    {
        return $this->hasMany(MealPlanDetail::class);
    }

    protected static function booted()
    {
        static::deleting(function ($mealPlan) {
            $mealPlan->deleted_by = auth()->id();
            $mealPlan->save();
        });
    }
}

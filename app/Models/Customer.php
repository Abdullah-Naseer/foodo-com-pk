<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Customer extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'email',
        'company',
        'phone',
        'address',
        'password',
    ];

    public function mealPlans()
    {
        return $this->hasMany(MealPlan::class);
    }
}

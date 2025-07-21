<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'customer_id',
        'menu_type_id',
        'amount_received',
        'monthly_expense',
        'month',
        'profit',
        'profit_percentage',
        'notes',
        'user_id'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function menuType()
    {
        return $this->belongsTo(MenuType::class);
    }
}

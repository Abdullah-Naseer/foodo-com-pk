<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = "history";
    protected $fillable = [
        'entity',
        'action',
        'values',
        'changes',
        'url',
        'method',
        'ip',
        'agent',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'currency_id',
        'balance',
        'branch_number',
        'branch_name',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];


    ## Relations

    function transactions()
    {
        return $this->hasMany(Transaction::class, 'account_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }


    ## Getters & Setters
    
    public function getBalanceAttribute()
    {
        return $this->attributes['balance'] / 100;
    }

    public function setBalanceAttribute($value)
    {
        $this->attributes['balance'] = $value * 100;
    }
}

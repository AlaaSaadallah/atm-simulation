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
        'is_default'
    ];

    protected $casts = [
        'is_default' => 'boolean'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];


    public function getRouteKeyName()
    {
        return 'reference_number';
    }


    ## Relations

    function transactions()
    {
        return $this->hasMany(Transaction::class, 'account_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }


    ## Getters & Setters

    public function setReferenceNumberAttribute()
    {
        $this->attributes['reference_number'] = str_pad($this->id, 7, "0", STR_PAD_LEFT);
    }

    public function getBalanceAttribute()
    {
        return $this->attributes['balance'] / 100;
    }

    public function setBalanceAttribute($value)
    {
        $this->attributes['balance'] = $value * 100;
    }
}

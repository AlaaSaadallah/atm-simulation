<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id',
        'atm_id',
        'type_id',
        'amount',
        'balance_before',
        'balance_after',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    ## Relations

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }

    public function atm()
    {
        return $this->belongsTo(Atm::class, 'atm_id');
    }

    public function transactionType()
    {
        return $this->belongsTo(TransactionType::class, 'type_id');
    }

     ## Getters & Setters

    //  balance before
     public function getBalanceBeforeAttribute()
     {
         return $this->attributes['balance_before'] / 100;
     }

     public function setBalanceBeforeAttribute($value)
     {
         $this->attributes['balance_before'] = $value * 100;
     }

    //  balance after
     public function getBalanceAfterAttribute()
     {
         return $this->attributes['balance_after'] / 100;
     }

     public function setBalanceAfterAttribute($value)
     {
         $this->attributes['balance_after'] = $value * 100;
     }

    //  amount
     public function getAmountAttribute()
     {
         return $this->attributes['amount'] / 100;
     }

     public function setBAmountAttribute($value)
     {
         $this->attributes['amount'] = $value * 100;
     }

}

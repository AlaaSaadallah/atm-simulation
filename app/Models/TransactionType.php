<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];


    protected $dates = [
        'created_at',
        'updated_at',
    ];

    ## Relations

    public function transactions()
    {
        return $this->belongsToMany(Transaction::class);
    }
}

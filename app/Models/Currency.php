<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = [
        'iso_code',
        'name',
        'symbol',
    ];


    protected $dates = [
        'created_at',
        'updated_at',
    ];

    ## Relations

    public function accounts()
    {
        return $this->belongsToMany(Account::class);
    }
}

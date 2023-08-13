<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atm extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'is_deposital'
    ];

    protected $casts = [
        'is_deposital' => 'boolean'
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

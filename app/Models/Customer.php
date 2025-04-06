<?php

namespace App\Models;

use App\Models\User;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'address',
        'user_id'
    ];

    // public function invoices()
    // {
    //     return $this->hasMany(Invoice::class);
    // }

    // public function users()
    // {
    //     return $this->belongsTo(User::class);
    // }
}

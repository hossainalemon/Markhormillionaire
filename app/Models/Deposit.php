<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'payment_method',
        'status',
        'transaction_number',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentTerm extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'year',
        'paid',        // Indicates payment status (0 = unpaid, 1 = paid)
    ];


}

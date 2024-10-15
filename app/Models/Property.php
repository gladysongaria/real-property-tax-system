<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'tax_declaration',
        'location',
        'barangay',
        'classification_id',
        'market_value',
        'assess_value',
        'sub_class',
        'previous_td',
        'date_approved'
    ];

}

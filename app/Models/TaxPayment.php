<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'taxpayer_name',
        'or_number',
        'or_date',
        'property_id',
        'term',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }


}

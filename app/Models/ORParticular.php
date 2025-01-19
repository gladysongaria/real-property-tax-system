<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ORParticular extends Model
{
    use HasFactory;

    protected $table = 'or_particulars';

    protected $fillable = [
        'or_id',
        'property_id',
        'term',
        'tax_due',
        'penalty',
        'discount',
        'inclusive_years',
        'customer_discount',
        'customer_penalty',
        'customer_last_term',
        'total_tax_due',
    ];

    // Relationship with OfficialReceipt
    public function officialReceipt()
    {
        return $this->belongsTo(OfficialReceipt::class, 'or_id');
    }

    // Relationship with Property
    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
}

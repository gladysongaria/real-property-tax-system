<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
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

    // Define many-to-many relationship
    public function owners()
    {
        return $this->belongsToMany(Owner::class, 'property_owners');
    }

    public function paymentTerms()
    {
        return $this->hasMany(PaymentTerm::class);
    }
}

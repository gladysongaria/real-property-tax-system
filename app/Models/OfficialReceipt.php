<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficialReceipt extends Model
{
    use HasFactory;

    protected $fillable = [
        'or_no',
        'or_date',
        'issued_to',
        'issued_by',
        'amount_paid',
        'balance',
        'penalty',
        'discount',
    ];

    // Relationship with ORParticulars
    public function orParticulars()
    {
        return $this->hasMany(ORParticular::class, 'or_id');
    }
}

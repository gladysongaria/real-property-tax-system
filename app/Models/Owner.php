<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    protected $fillable = [
        'last_name',
        'first_name',
        'middle_name',
        'ext_name',
        'address',
        'status_id'
    ];

    // Define many-to-many relationship
    public function properties()
    {
        return $this->belongsToMany(Property::class, 'property_owners');
    }
}


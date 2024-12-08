<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyOwner extends Model
{
    use HasFactory;

    protected $table = 'property_owners';

    protected $fillable = [
        'owner_id',
        'property_id',
    ];

    public function owners()
{
    return $this->belongsToMany(Owner::class, 'property_owners', 'property_id', 'owner_id');
}

}

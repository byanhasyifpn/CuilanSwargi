<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccommodationService extends Model
{
    protected $fillable = [
        'accommodation_id',
        'name',
        'price',
        'facilities',
    ];

    public function accommodation()
    {
        return $this->belongsTo(Accommodation::class);
    }

    public function getFacilitiesArrayAttribute()
    {
        return explode(',', $this->facilities);
    }
}

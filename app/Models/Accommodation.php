<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'capacity',
    ];    

    public function images()
    {
        return $this->hasMany(AccommodationImage::class);
    }

    public function getFacilitiesArrayAttribute()
    {
        return explode(',', $this->facilities);
    }

    public function services()
{
    return $this->hasMany(AccommodationService::class);
}

}
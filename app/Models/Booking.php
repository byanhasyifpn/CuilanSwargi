<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'order_code',
        'name',
        'phone',
        'email',
        'service_id',
        'service_name',
        'check_in',
        'check_out',
        'notes',
        'status',
    ];

    protected $casts = [
        'status'    => 'string',
        'check_in'  => 'date',
        'check_out' => 'date',
    ];

    public function service()
    {
        return $this->belongsTo(AccommodationService::class, 'service_id');
    }

    public function getStatusLabelAttribute(): string
    {
        return match($this->status) {
            'pending'   => 'Pending',
            'paid'      => 'Paid',
            'completed' => 'Completed',
            default     => 'Unknown',
        };
    }

    public function getStatusColorAttribute(): string
    {
        return match($this->status) {
            'pending'   => 'bg-yellow-100 text-yellow-800',
            'paid'      => 'bg-blue-100 text-blue-800',
            'completed' => 'bg-green-100 text-green-800',
            default     => 'bg-gray-100 text-gray-800',
        };
    }
}

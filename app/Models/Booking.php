<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'apartment_id',
        'check_in',
        'check_out',
    ];

    protected $dates = [
        'check_in',
        'check_out',
    ];

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }
}

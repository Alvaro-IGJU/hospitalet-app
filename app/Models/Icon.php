<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Icon extends Model
{
    use HasFactory;

    protected $fillable = ['text', 'tag', 'type_id'];

    public function apartments()
    {
        return $this->belongsToMany(Apartment::class, 'apartment_icon');
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
    ];

    public function appointments()
    {
        return $this->belongsToMany(Appointment::class, 'appointment_medicine')->withPivot('quantity');
    }
}

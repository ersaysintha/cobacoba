<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['doctor_id', 'patient_id', 'date_time', 'fee', 'status'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function patient()
    {
        return $this->belongsTo(User::class);
    }

    use HasFactory;

    public function medicines()
    {
        return $this->belongsToMany(Medicine::class, 'appointment_medicine')->withPivot('quantity');
    }
}

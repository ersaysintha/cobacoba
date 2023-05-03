<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentMedicine extends Model
{
    use HasFactory;

    protected $table = 'appointment_medicine';

    protected $fillable = ['appointment_id', 'medicine_id', 'quantity'];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }
}

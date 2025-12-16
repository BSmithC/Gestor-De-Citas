<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'doctor_id',
        'patient_id',
        'attended',
        'date',
        'starttime',
        'endtime',
        'active',
    ];
    public function Doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id', 'id');
    }
    public function Patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');
    }
    public function Drug()
    {
        return $this->belongsTo(Drug::class, 'drug_id', 'id');
    }
}

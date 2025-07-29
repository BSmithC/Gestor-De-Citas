<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
    use HasFactory;
        protected $fillable = [
            'diagnosis',
            'reason',
            'symptoms',
            'diagnosis_description',
            'description',
            'blood_pressure',
            'temperature',
            'weight',
            'heart_rate',
            'observation',
            'patient_id',
            'doctor_id',
            'drug_id',
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

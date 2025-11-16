<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
        protected $fillable = [
            'DNI',
            'name',
            'sur_name',
            'last_name',
            'second_sur_name',
            'date_of_birth',
            'phone_number',
            'nacionality',
            'address',
            'gender',
            'sex',
            'marital_status',
            'ocupation',
            'place_of_birth',
            'blood_type',
            'insurance',
            'status',
            'email',
        ];
    public function User()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
    public function Bill()  
    {
        return $this->hasMany(Bill::class, 'patient_id', 'id');
    }
<<<<<<< HEAD
    public function medicalhistory()  
    {
        return $this->hasOne(medicalhistory::class, 'patient_id', 'id');
    }
    public function appointment()  
    {
        return $this->hasMany(appointment::class, 'patient_id', 'id');
=======
    public function Appointment()  
    {
        return $this->hasMany(Appointment::class, 'patient_id', 'id');
>>>>>>> 75b04bc (Modificaciones con los show, paginaciones y index)
    }
}

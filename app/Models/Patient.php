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
}

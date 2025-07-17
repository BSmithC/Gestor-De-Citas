<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'drug_id',
        'patient_id',
        'users_id',
        'itbis',
        'sub_total',
        'total',
        'payment_type',
        'status'
    ];
    public function Drugs()
    {
        return $this->hasMany(Drug::class, 'id', 'drug_id');
    }
    public function User()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
    public function Patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');
    }
    public function BillDetails()
    {
        return $this->hasMany(BillDetail::class, 'bills_id', 'id');
    }
}
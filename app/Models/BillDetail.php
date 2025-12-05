<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'bills_id',
        'patient_id',
        'service',
        'hour',
        'price',
    ];
    public function Bill()
    {
        return $this->belongsTo(Bill::class, 'bills_id', 'id');
    }
    public function Patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');
    }
}

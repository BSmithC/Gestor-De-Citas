<?php

namespace App\Models;

// use Illuminate\Notifications\Notification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
        use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'route',
        'frequency',
        'duration',
    ];
    public function Bill()
    {
        return $this->hasMany(Bill::class, 'drug_id', 'id');
    }
    public function BillDetails()
    {
        return $this->hasMany(BillDetail::class, 'drugs_id', 'id');
    }
}

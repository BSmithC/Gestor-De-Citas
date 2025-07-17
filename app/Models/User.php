<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'sur_name',
        'last_name',
        'second_sur_name',
        'date_of_bith',
        'phone_number',
        'nacionality',
        'address',
        'gender',
        'sex',
        'ocupation',
        'place_of_birth',
        'insurance',
        'status',
        'email',
        'password',
    ];
    public function Bill()
    {
        return $this->hasMany(Bill::class, 'users_id', 'id');
    }
    public function Patient()
    {
        return $this->hasMany(Patient::class, 'users_id', 'id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}

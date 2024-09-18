<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

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
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
    public function members()
    {
        return $this->hasMany(Member::class);
    }

    public function achievements()
    {
        return $this->hasMany(Achievement::class, 'user_id');
    }
    public function sport_certificates()
    {
        return $this->hasMany(SportCertificate::class, 'id');
    }
    public function payment_history()
    {
        return $this->hasMany(PaymentHistory::class);
    }
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    public function teamProfiles()
    {
        return $this->belongsToMany(TeamProfiles::class, 'team_member', 'athlete_id', 'team_profile_id');
    }
}

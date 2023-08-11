<?php

namespace App\Models;

use Hashids\Hashids;
use App\Models\Kelas;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function getIdAttribute()
    {
        if (!request()->routeIs('home') && !request()->routeIs('classdetail') && !request()->routeIs('loginproses') && !request()->routeIs('studentdashboard')) :
            $hashids = new Hashids(env('MY_SECRET_SALT_KEY'), 12, env('MY_ALPHABET_KEY'));
            return $hashids->encode($this->attributes['id']);
        else :
            return $this->attributes['id'];
        endif;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [''];

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

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }

    public function materi()
    {
        return $this->hasMany(Materi::class, 'user_id');
    }

    public function pendidikan()
    {
        return $this->hasMany(Pendidikan::class, 'user_id');
    }

    public function VerifyUser()
    {
        return $this->hasMany(Kelas::class);
    }
}

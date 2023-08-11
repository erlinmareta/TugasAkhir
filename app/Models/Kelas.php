<?php

namespace App\Models;

use App\Models\User;
use Hashids\Hashids;
use App\Models\Materi;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas extends Model
{
    protected $guarded = [''];

    public function getIdAttribute()
    {
        if (!request()->routeIs('home') && !request()->routeIs('studentdashboard') && !request()->routeIs('student_course') && !request()->routeIs('mentorprofile')) :
            $hashids = new Hashids(env('MY_SECRET_SALT_KEY'), 12, env('MY_ALPHABET_KEY'));
            return $hashids->encode($this->attributes['id']);
        else :
            return $this->attributes['id'];
        endif;
    }

    public function materi()
    {
        return $this->hasMany(Materi::class);
    }

    public function materi_class()
    {
        return $this->hasOne(Materi::class);
    }

    public function rating()
    {
        return $this->hasMany(Rating::class);
    }
    public function subscription()
    {
        return $this->hasMany(Subscription::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

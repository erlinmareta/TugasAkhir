<?php

namespace App\Models;

use App\Models\User;
use Hashids\Hashids;
use App\Models\Kelas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Materi extends Model
{
    protected $table = "materi";
    protected $guarded = [''];

    public function getIdAttribute()
    {
        if (!request()->routeIs('StudentDashboard') && !request()->routeIs('student_course')) :
            $hashids = new Hashids(env('MY_SECRET_SALT_KEY'), 12, env('MY_ALPHABET_KEY'));
            return $hashids->encode($this->attributes['id']);
        else :
            return $this->attributes['id'];
        endif;
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

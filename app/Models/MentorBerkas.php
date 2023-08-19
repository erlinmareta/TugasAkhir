<?php

namespace App\Models;

use Hashids\Hashids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MentorBerkas extends Model
{
    use HasFactory;
    protected $table = "mentor_berkas", $guarded = ['id'];

    public function getIdAttribute()
    {
        $hashids = new Hashids(env('MY_SECRET_SALT_KEY'), 12, env('MY_ALPHABET_KEY'));
        return $hashids->encode($this->attributes['id']);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

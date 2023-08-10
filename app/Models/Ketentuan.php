<?php

namespace App\Models;

use Hashids\Hashids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ketentuan extends Model
{
    protected $table = "ketentuan";
    protected $guarded = [''];
    public function getIdAttribute()
    {
        $hashids = new Hashids(env('MY_SECRET_SALT_KEY'), 12, env('MY_ALPHABET_KEY'));

        return $hashids->encode($this->attributes['id']);
    }
}

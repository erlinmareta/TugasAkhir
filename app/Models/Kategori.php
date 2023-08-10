<?php

namespace App\Models;

use Hashids\Hashids;
use App\Models\Kelas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    protected $table = "kategori";
    protected $fillable = [
        'id',
        'nama',
    ];

    public function getIdAttribute()
    {
        $hashids = new Hashids(env('MY_SECRET_SALT_KEY'), 12, env('MY_ALPHABET_KEY'));

        return $hashids->encode($this->attributes['id']);
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }
}

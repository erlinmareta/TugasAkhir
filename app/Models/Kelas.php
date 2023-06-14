<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Materi;
use App\Models\Kategori;
use App\Models\User;

class Kelas extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'kategori_id',
        'judul',
        'gambar',
        'deskripsi',
        'status',
    ];

    public function materi()
    {
        return $this->hasMany(Materi::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class,'kategori_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
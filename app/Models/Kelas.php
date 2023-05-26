<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Materi;

class Kelas extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'judul',
        'gambar',
        'deskripsi',
        'status',
    ];

    public function materi()
    {
        return $this->hasMany(Materi::class);
    }

}

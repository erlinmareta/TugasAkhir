<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;

class Materi extends Model
{
    protected $table = "materi" ;
    protected $fillable = [
        'id',
        'user_id',
        'kelas_id',
        'judul',
        'isi_materi',
        'deskripsi',
        'urutan',
        'status',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class,'kelas_id');
    }

}

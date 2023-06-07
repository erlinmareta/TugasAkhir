<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;

class Kategori extends Model
{
    protected $table = "kategori" ;
    protected $fillable = [
        'id',
        'nama',
    ];

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }
}

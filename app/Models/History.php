<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $table = "history";

    protected $guarded = [''];

    public function kelas()
    {
        return $this->belongsTo("App\Models\Kelas", "kelas_id", "id");
    }

    public function materi()
    {
        return $this->belongsTo("App\Models\Materi", "materi_id", "id");
    }

    public function user()
    {
        return $this->belongsTo("App\Models\User", "user_id", "id");
    }
}

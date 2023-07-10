<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Comment extends Model
{
    protected $table = "comment";
    protected $guarded = [''];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function reply()
    {

        return $this->hasMany(Comment::class, 'reply_id')->with('reply');
    }
}

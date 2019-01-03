<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $fillable = ['title', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class)->select(['id', 'name']);
    }
}

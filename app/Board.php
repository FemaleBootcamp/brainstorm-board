<?php

namespace App;

use App\User;
use App\Idea;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $fillable = ['title', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class)->select(['id', 'name']);
    }

    public function idea()
    {
        return $this->hasMany(Idea::class);
    }
}

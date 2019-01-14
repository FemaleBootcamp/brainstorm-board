<?php

namespace App;

use App\Board;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    public $timestamps = false;

    protected $fillable = ['title', 'description', 'user_id', 'board_id'];

    public function board()
    {
        return $this->belongsTo(Board::class);
    }

}



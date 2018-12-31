<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Board extends Model
{
    protected $fillable = ['title', 'user_id'];

    public function user(){
    	return $this->belongsTo(User::class)->select(['id', 'name']);
    }
}

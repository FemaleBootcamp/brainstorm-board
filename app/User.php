<?php

namespace App;

use App\Board;
use App\Idea;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function boards()
    {
        return $this->hasMany(Board::class);
    }

    public function ideas()
    {
        return $this->hasMany(Idea::class);
    }
}

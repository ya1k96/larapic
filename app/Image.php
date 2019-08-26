<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
// Relacion de uno a muchos
    public function comments() {
        return $this->hasMany('App\Comment');
    }

    public function likes() {
        return $this->hasMany('App\Like');
    }

// Relacion de Muchos a Uno
    public function user() {
        return $this->belongsTo('APP\User', 'user_id');
    }
}


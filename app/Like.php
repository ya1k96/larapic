<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';

    // Relacion de Muchos a Uno
    public function user() {
        return $this->belongsTo('APP\User', 'user_id');
    }

    // Relacion de Muchos a Uno
    public function image() {
        return $this->belongsTo('APP\Image', 'image_id');
    }
}

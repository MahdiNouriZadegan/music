<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;

    public function tags() {
        return $this->hasMany(Tag::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    } 

    public function favorites() {
        return $this->belongsToMany(Favorite::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    } 

    public function singer() {
        return $this->belongsTo(Singer::class);
    }
}

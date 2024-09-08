<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $table = 'musics';
    use HasFactory;

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    } 

    public function favorites() {
        return $this->hasMany(Favorite::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    } 

    public function singer() {
        return $this->belongsTo(Singer::class);
    }

    public function menu() {
        return $this->belongsTo(Menu::class);
    }

    protected $fillable = [
        'title',
        'description',
        'content',
        'singer_id',
        'menu_id',
        'commentable',
        'reactionable',
        'status',
        'view',
        'cover',
        'music_url'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function music() {
        return $this->belongsTo(Music::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function feedbacks () {
        return $this->hasMany(Feedback::class);
    }
    protected $fillable = [
        'comment',
        'music_id',
        'user_id'
    ];
}

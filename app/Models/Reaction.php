<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    use HasFactory;

    public function music() {
        return $this->hasOne(Music::class);
    }

    protected $fillable = [
        'ip',
        'music_id',
        'reaction'
    ];
}

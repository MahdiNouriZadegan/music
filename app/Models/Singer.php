<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Singer extends Model
{
    use HasFactory;

    public function musics() {
        return $this->hasMany(Music::class);
    }

    protected $fillable = [
        'name',
        'image'
    ];
}

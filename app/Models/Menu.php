<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    public function musics() {
        return $this->hasMany(Music::class);
    }

    protected $fillable = [
        'name'
    ];
}

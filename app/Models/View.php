<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    use HasFactory;

    public function post() {
        return $this->belongsTo(Music::class);
    }
    protected $fillable = [
        'music_id',
        'ip'
    ];
}

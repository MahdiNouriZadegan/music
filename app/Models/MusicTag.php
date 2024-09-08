<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MusicTag extends Model
{
    use HasFactory;

    protected $table = 'music_tag';

    protected $fillable = [
        'music_id',
        'tag_id'
    ];
}

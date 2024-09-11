<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table = 'feedbacks';
    public function comment() {
        return $this->belongsTo(Comment::class);
    }

    protected $fillable = [
        'ip',
        'feedback',
        'comment_id'
    ];
}

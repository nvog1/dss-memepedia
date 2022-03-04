<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_date',
        'comment',
        'rating',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function meme() {
        return $this->belongsTo('App\Models\Meme');
    }
}

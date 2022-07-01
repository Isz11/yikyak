<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Yak extends Model
{
    use HasFactory;

    protected $fillable = [
        'yak',
        'score',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function reply() {
        return $this->hasMany(Replies::class);
    }
    public function vote() {
        return $this->hasMany(Vote::class);
    }
}

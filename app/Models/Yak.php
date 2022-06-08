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
    public function yaks() {
        return $this->hasMany(Reply::class);
    }
    public function votes() {
        return $this->hasMany(Reply::class);
    }
}

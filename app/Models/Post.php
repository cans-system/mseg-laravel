<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $casts = [
        'published_at' => 'date'
    ];

    public function getImageUrl($name) {
        return $this->$name ? asset('uploads/'.$this->$name) : asset('img/no-image.png');
    }
}

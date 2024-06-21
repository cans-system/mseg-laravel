<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mansion extends Model
{
    use HasFactory;

    protected $casts = [
        'birthday' => 'date'
    ];

    public function getImageUrl($name) {
        if ($this->$name) {
            return asset('uploads/'.$this->$name);
        } else {
            return asset('img/no-image.png');
        }
    }

    public function images(): HasMany {
        return $this->hasMany(Image::class);
    }
}

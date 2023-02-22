<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'url_app',
        'media_link'
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}

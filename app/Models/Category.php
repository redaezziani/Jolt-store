<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'cover_img', 'slug'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // Mutator for generating slug from name attribute
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value); // Use Laravel's Str::slug() to generate slug
    }
}

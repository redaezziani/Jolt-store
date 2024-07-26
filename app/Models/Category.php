<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'cover_img']; // Ensure correct field names

    public function products()
    {
        return $this->hasMany(Product::class); // Define the relationship
    }
}

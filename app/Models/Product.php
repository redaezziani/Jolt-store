<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description', // Corrected attribute name
        'cover_img',
        'prev_imgs',
        'quantity',
        'rating',
        'sizes',
        'colors',
        'shipping', // Corrected attribute name
        'category_id',
        'slug', // Added slug attribute
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $product->slug = Str::slug($product->name); // Generating slug from name
        });

        static::updating(function ($product) {
            $product->slug = Str::slug($product->name); // Regenerate slug if name changes
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class); // Define the correct relationship
    }

    public function discounts()
    {
        return $this->hasMany(Discount::class); // Define the correct relationship
    }

    public function removeAllDiscounts()
    {
        $this->discounts()->delete();
    }
}

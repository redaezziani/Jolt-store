<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'cover_img',
        'prev_imgs',
        'quantity',
        'rating',
        'sizes',
        'colors',
        'shipping',
        'category_id',
        'slug',
    ];

    protected static function boot()
    {
        parent::boot();

        // Generate or update slug before creating or updating the product
        static::creating(function ($product) {
            $product->slug = Str::slug($product->name);
        });

        static::updating(function ($product) {
            $product->slug = Str::slug($product->name);
        });

        // Invalidate cache when product is created, updated, or deleted
        static::saved(function ($product) {
            Cache::forget('new_arrivals_' . request()->filter);
        });

        static::deleted(function ($product) {
            Cache::forget('new_arrivals_' . request()->filter);
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function discounts()
    {
        return $this->hasMany(Discount::class);
    }

    public function removeAllDiscounts()
    {
        $this->discounts()->delete();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}

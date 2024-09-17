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
        'price',
        'sizes',
        'colors',
        'shipping',
        'category_id',
        'slug',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $product->slug = Str::slug($product->name);
        });

        static::updating(function ($product) {
            $product->slug = Str::slug($product->name);
        });

        static::saved(function ($product) {
            $filter = request()->filter ?? 'default';
            Cache::forget('new_arrivals_' . $filter);
        });

        static::deleted(function ($product) {
            $filter = request()->filter ?? 'default';
            Cache::forget('new_arrivals_' . $filter);
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

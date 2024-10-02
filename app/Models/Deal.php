<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Deal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'slug',
        'discount_id',
        'cover_img',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($deal) {
            $deal->slug = Str::slug($deal->name);
        });

        static::updating(function ($deal) {
            $deal->slug = Str::slug($deal->name);
        });
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class);  // Ensure the correct namespace is used here
    }

    public function products()
{
    return $this->belongsToMany(Product::class, 'deal_product');
}

}

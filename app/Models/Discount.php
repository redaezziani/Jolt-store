<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class Discount extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'value',
        'product_id',
        'start_date',
        'end_date',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function deal()
    {
        return $this->hasMany(Deal::class);
    }
}

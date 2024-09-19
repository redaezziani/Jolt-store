<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['comment_text', 'product_id', 'user_id', 'rating', 'status'];

    /**
     * Get the product that the comment belongs to.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the user that posted the comment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

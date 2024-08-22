<?php

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/scrape', function (Request $request) {
    $products = $request->all(); // Get the array of products

    foreach ($products as $productData) {
        try {
            // Get cover image URL and download it
            $cover_img_url = $productData['cover_img'];
            $cover_img_name = time() . '_' . basename($cover_img_url);
            // this needs to be like /public/products/cover_images/slug/cover_img_name
            $cover_img_path = 'products/cover_images/' . $productData['slug'] . '/' . $cover_img_name;
            $cover_img_content = Http::get($cover_img_url)->body();
            Storage::disk('public')->put($cover_img_path, $cover_img_content);

            // Get previous images URLs, download them, and store paths
            $prev_imgs_urls = explode('@', $productData['prev_imgs']);
            $prev_imgs_paths = [];
            foreach ($prev_imgs_urls as $url) {
                $img_name = time() . '_' . basename($url);
                // this needs to be like /public/products/prev_images/slug/img_name
                $img_path = 'products/prev_images/' . $productData['slug'] . '/' . $img_name;
                $img_content = Http::get($url)->body();
                Storage::disk('public')->put($img_path, $img_content);
                $prev_imgs_paths[] = $img_path;
            }
            $prev_imgs = implode('@', $prev_imgs_paths);

            // Store product in the database
            Product::create([
                'name' => $productData['name'],
                'description' => $productData['description'] ?? '',
                'cover_img' => $cover_img_path,
                'prev_imgs' => $prev_imgs,
                'quantity' => $productData['quantity'],
                'rating' => $productData['rating'],
                // ensure price is converted to float
                'price' => (float) $productData['price'],
                'sizes' => $productData['sizes'] ?? '',
                'colors' => $productData['colors'] ?? '',
                'shipping' => $productData['shipping'] ?? 'Paid',
                'category_id' => $productData['category_id'],
                'slug' => $productData['slug']
            ]);
        } catch (\Exception $e) {
            Log::error('Error creating product:', ['error' => $e->getMessage()]);
        }
    }

    return response()->json([
        'message' => 'Products created successfully',
    ], 201);
});

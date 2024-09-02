<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; // For making HTTP requests

class ProductTranslationController extends Controller
{
    public function translate(Request $request, $id)
    {
        // Find the product by ID
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        // Translate name and description
        $translatedName = $this->translateText($product->name);
        $translatedDescription = $this->translateText($product->description);

        // Update product with translated text
        $product->update([
            'name' => $translatedName,
            'description' => $translatedDescription,
        ]);

        return response()->json($product);
    }

    private function translateText($text)
    {
        // Example with a mock translation service
        $response = Http::post('https://api.mocktranslation.com/translate', [
            'text' => $text,
            'target_language' => 'ar', // Arabic language code
        ]);

        return $response->json('translated_text'); // Assuming the API returns 'translated_text'
    }
}

<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Facades\Cache;

class NewCategory extends Component
{
    public function render()
    {
        // Define a static cache key base
        $cacheKeyBase = 'latest_random_category';

        // Check if cache exists for categories
        if (!Cache::has($cacheKeyBase)) {
            // If no cache exists, retrieve all categories
            $allCategories = Category::all();

            // Shuffle the categories and store them in cache for 60 seconds
            $shuffledCategories = $allCategories->shuffle();
            Cache::put($cacheKeyBase, $shuffledCategories, 60);
        } else {
            // Retrieve shuffled categories from cache
            $shuffledCategories = Cache::get($cacheKeyBase);
        }

        // Get the next random category in the shuffled list
        $latestCategory = $shuffledCategories->pop();

        // Update the cache with the remaining shuffled categories
        Cache::put($cacheKeyBase, $shuffledCategories, 60);

        return view('livewire.new-category', ['latestCategory' => $latestCategory]);
    }
}

<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Cache;
use App\Models\Category;
use Livewire\WithPagination;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Pagination\LengthAwarePaginator;

class NewArrivals extends Component
{
    use WithPagination;

    public $filter = '';

    protected $queryString = ['filter'];

    public function applyFilter($filter)
    {
        $this->filter = $filter;
    }

    public function placeholder()
    {
        return <<<'html'
          <p> data ....</p>
          html;
    }

    public function render()
    {
        // Use the current page number in the cache key
        $currentPage = $this->getPage();
        $cacheKey = 'new_arrivals_' . $this->filter . '_page_' . $currentPage;

        // Retrieve or cache the query results
        $new_arrivals = Cache::remember($cacheKey, 60, function () {
            if ($this->filter) {
                return Product::whereHas('category', function ($query) {
                    $query->where('slug', $this->filter);
                })->orderBy('created_at', 'desc')->get();
            } else {
                return Product::orderBy('created_at', 'desc')->get();
            }
        });

        // Cache categories separately
        $categories = Cache::remember('categories', 60, function () {
            return Category::inRandomOrder()->limit(4)->get();
        });

        // Manually paginate the cached results
        $paginatedResults = $new_arrivals->forPage($currentPage, 10);
        $totalResults = $new_arrivals->count();

        // Create a paginator instance for the cached results
        $new_arrivals_paginated = new LengthAwarePaginator(
            $paginatedResults,
            $totalResults,
            10,
            $currentPage,
            ['path' => url()->current(), 'query' => request()->query()]
        );

        return view('livewire.new-arrivals', [
            'new_arrivals' => $new_arrivals_paginated,
            'categories' => $categories
        ]);
    }
}

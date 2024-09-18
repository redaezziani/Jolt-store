<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class RandomCategories extends Component
{
    public function render()
    {
        $categories = Category::inRandomOrder()->take(3)->get();
        return view('livewire.random-categories', ['categories' => $categories]);
    }
}

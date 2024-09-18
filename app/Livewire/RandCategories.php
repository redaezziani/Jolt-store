<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class RandCategories extends Component
{
    public function render()
    {
        $categories = Category::inRandomOrder()->take(3)->get();
        return view('livewire.rand-categories', ['categories' => $categories]);
    }
}

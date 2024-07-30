<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class NewCategory extends Component
{
    public function render()
    {
        // randomize the categories
        $latestCategory = Category::inRandomOrder()->first();
        return view('livewire.new-category', ['latestCategory' => $latestCategory]);
    }
}

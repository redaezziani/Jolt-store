<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class NewCategory extends Component
{
    public function render()
    {
        $latestCategory = Category::latest()->first(); // get the latest category
        return view('livewire.new-category', ['latestCategory' => $latestCategory]);
    }
}

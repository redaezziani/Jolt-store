<?php

namespace App\Livewire;

use App\Models\Deal;
use Livewire\Component;

class DealsSlideShow extends Component
{
    public $deals;

    public function mount()
    {
        $this->deals = Deal::with('products', 'discount')->limit(5)->get();
    }
    public function render()
    {
        return view('livewire.deals-slide-show', [
            'deals'=> $this->deals
            ]);
    }
}

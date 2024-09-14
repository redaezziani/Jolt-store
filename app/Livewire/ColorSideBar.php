<?php
namespace App\Livewire;

use Livewire\Component;

class ColorSideBar extends Component
{
   
    public function render()
    {
        return view('livewire.color-side-bar', [
            'Colors' => $this->selectedColors
        ]);
    }
}

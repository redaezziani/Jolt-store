<?php

namespace App\Livewire;

use Livewire\Component;

class UserAvatar extends Component
{
    public function render()
    {
        // get the authenticated user
        $user = auth()->user();

        return view('livewire.user-avatar', compact('user'));
    }
}

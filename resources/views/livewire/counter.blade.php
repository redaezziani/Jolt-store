<?php

use function Livewire\Volt\{state};
use Livewire\Volt\Component;
new class extends Component {
    public $count = 0;

    public function increment()
    {
        $this->count++;
    }
}; ?>

<div>
    <x-button class="default" wire:click="increment">
        Increment
    </x-button>
    <h1>{{ $count }}</h1>
</div>

<?php

use function Livewire\Volt\{state};
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use App\Models\Category;
new class extends Component {
    use WithFileUploads;
    public $name="",$description="",$cover_img="";

    public function createCategory()
    {
        $coverImagePath = null;
        if ($this->cover_img) {
            $coverImagePath = $this->cover_img->store('cover_images', 'public');
        }

        Category::create([
            "name"=>$this->name,
            "description"=>$this->description,
            "cover_img"=> $coverImagePath,
        ]);
        // Reset form fields
        $this->reset();
    }
}; ?>

<form
wire:submit.prevent="createCategory"
class=" flex justify-start items-start flex-col gap-4"
>
<div class="flex gap-1 flex-col justify-start items-start">
    <h1
    class=" text-slate-800 text-lg font-semibold"
    >
            Create a Category
    </h1>
    <p
    class=" text-slate-500 lowercase text-sm"
    >
        Create a new Category in your store by fill the inputs bellow.
    </p>
</div>
<div class="flex mt-10 flex-col  w-full md:w-[27rem] gap-3">
    <x-label for="name">
    Your Category Name
    </x-label>
    <x-input wire:model="name" type="text" placeholder="" name=""/>
 </div>
 <div class="flex flex-col  w-ffull md:w-[27rem] gap-3">
    <x-label for="description">
    Your Category Description
    </x-label>
    <x-input wire:model="description" type="text" placeholder="" name=""/>
 </div>
 <div class="mb-4 flex flex-col items-start justify-start gap-2">
    <x-label for="cover_img">Your image cover </x-label>
    <x-input wire:model="cover_img" type="file" id="cover_img" placeholder="" />
</div>
 <div class="flex gap-x-4 w-full justify-end items-center">
    <x-button
    class="outline"
    >
        Cancel
    </x-button>
    <x-button
    wire:loading.attr="disabled" type="submit" class="default">
        <p
        wire:loading.class=' hidden'
        >
            Create Category
        </p>
        <div wire:loading
        class="size-4 animate-spin rounded-full border-[2px] border-current border-t-transparent text-white dark:text-white"
        role="status" aria-label="loading">
        <span class="sr-only">Loading...</span>
    </div>
    </x-button>
 </div>
</div>

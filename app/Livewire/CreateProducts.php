<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Illuminate\Support\Str;

class CreateProducts extends Component
{

    use WithFileUploads;
    public $name = '';
    public $description = ''; // Corrected attribute name
    public $cover_img = '';
    public $quantity = 0;
    public $sizes = '';
    public $colors = '';
    public $prev_imgs = [];
    public $price = 0;
    public $shipping = 'paid'; // Corrected attribute name
    public $category_id = null;
    protected $rules = [
        'name' => 'required',
        'description' => 'required',
        'cover_img' => 'nullable|image|max:1024', // Example validation for image file
        'quantity' => 'required|integer|min:0',
        'price' => 'required|numeric|min:0',
        'shipping' => 'required|in:Free,Paid,Pickup',
        'sizes' => 'required',
        'colors' => 'required',
        'prev_imgs.*' => 'nullable|image|max:1024', // Example validation for multiple image files
    ];



    public function createProduct()
    {
        $this->validate();

        $coverImagePath = null;
        $slug = Str::slug($this->name);
        if ($this->cover_img) {
            $coverImagePath = null;
            // lets take the name and make  it a slug
            if ($this->cover_img instanceof \Illuminate\Http\UploadedFile) {
                $coverImagePath = $this->cover_img->store('products/cover_images/' . $slug, 'public');
            }
        }

        $imagesPaths = null;
        $imagesPathsString = '';

        if ($this->prev_imgs) {
            $imagesPaths = [];
            foreach ($this->prev_imgs as $image) {
                if ($image instanceof \Illuminate\Http\UploadedFile) {
                    $imagesPaths[] = $image->store('products/prev_images/' . $slug, 'public');
                    $imagesPathsString = implode("@", $imagesPaths);
                }
            }
        }

        Product::create([
            "name"=>$this->name,
            "description"=>$this->description,
            "cover_img"=> $coverImagePath,
            "colors"=> $this->colors,
            "sizes"=> $this->sizes,
            "quantity"=>$this->quantity,
            "category_id"=>$this->category_id,
            "price"=>$this->price,
            "shipping"=>$this->shipping,
            "prev_imgs"=> $imagesPathsString,
        ]);
         // display the toast notification!
        $this->dispatch('open-toast');
        // Reset form fields
        $this->reset();

    }

    public function cancelProduct (){
        $this->reset();
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.create-products', compact('categories'));
    }
}

<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Discount;
use App\Models\Product;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Illuminate\Support\Str;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\Storage;



class CreateProducts extends Component
{
    use Actions;
    use WithFileUploads;
    public $name = '';
    public $description = ''; // Corrected attribute name
    public $cover_img = '';
    public $quantity = 0;
    public $sizes = '';
    public $prev_imgs = [];
    public $price = 0;
    public $selectedColors = []; // Initialize as an array
    public $shipping = 'paid'; // Corrected attribute name
    public $category_id = 4;

    // information about the discount
    public $discount_name='';
    public $discount_value='';
    public $discount_start='';
    public $discount_end='';
     // Custom error messages in Arabic
     protected $messages = [
        'name.required' => 'حقل الاسم مطلوب.',
        'description.required' => 'حقل الوصف مطلوب.',
        'cover_img.image' => 'يجب أن تكون صورة الغلاف صورة صالحة.',
        'quantity.required' => 'الكمية مطلوبة.',
        'quantity.integer' => 'يجب أن تكون الكمية عددًا صحيحًا.',
        'price.required' => 'السعر مطلوب.',
        'price.numeric' => 'يجب أن يكون السعر رقمًا.',
        'discount_name.required_with' => 'الخصم مطلوب إذا تم إدخال قيمة الخصم.',
        'discount_value.required_with' => 'قيمة الخصم مطلوبة إذا تم إدخال خصم.',
    ];
    protected $rules = [
        'name' => 'required',
        'description' => 'required',
        'cover_img' => 'nullable|image|max:2024',
        'quantity' => 'required|integer|min:0',
        'price' => 'required|numeric|min:0',
        'prev_imgs.*' => 'nullable|image|max:7024',
        'discount_value' => 'nullable|numeric|min:0', // Example validation for discount value
        'discount_start' => 'nullable|date',
        'discount_end' => 'nullable|date',
    ];
    public function createDiscount($productId)
    {
        try {
            // Validate discount data before creating it
            $this->validate([
                'discount_name' => 'required|string|max:255',
                'discount_value' => 'required|numeric|min:0|max:100',
                'discount_start' => 'nullable|date',
                'discount_end' => 'nullable|date|after_or_equal:discount_start',
            ]);

            // Create the discount
            Discount::create([
                'name' => $this->discount_name,
                'value' => $this->discount_value,
                'start_date' => $this->discount_start,
                'end_date' => $this->discount_end,
                'product_id' => $productId, // Associate with the product
            ]);

            // Success Notification
            $this->notification()->success(
                $title = 'تم إنشاء الخصم بنجاح',
                $description = 'تم إنشاء الخصم الخاص بك بنجاح'
            );

        } catch (\Exception $e) {
            // Error Notification
            $this->notification()->error(
                $title = 'تم إنشاء الخصم بنجاح',
                $description = 'تم إنشاء الخصم الخاص بك بنجاح'
            );
        }
    }


    public function createProduct()
    {
        // Validate the input
        $this->validate();

        $coverImagePath = null;
        $slug = Str::slug($this->name);
        if ($this->cover_img instanceof \Illuminate\Http\UploadedFile) {
            $coverImagePath = $this->cover_img->store('products/cover_images/' . $slug, 'public');
        }

        $imagesPaths = null;
        $imagesPathsString = '';

        if ($this->prev_imgs) {
            $imagesPaths = [];
            foreach ($this->prev_imgs as $image) {
                if ($image instanceof \Illuminate\Http\UploadedFile) {
                    $imagesPaths[] = $image->store('products/prev_images/' . $slug, 'public');
                }
            }
            $imagesPathsString = implode("@", $imagesPaths);
        }
        $colorsString = implode("@",$this->selectedColors);
        // Create the product
        $product = Product::create([
            "name" => $this->name,
            "description" => $this->description,
            "cover_img" => $coverImagePath,
            "colors" => $colorsString,
            "sizes" => $this->sizes,
            "quantity" => $this->quantity,
            "category_id" => $this->category_id,
            "price" => $this->price,
            "shipping" => $this->shipping,
            "prev_imgs" => $imagesPathsString,
        ]);

        if ($this->discount_name && $this->discount_value && $this->discount_start && $this->discount_end) {
            $this->createDiscount($product->id);
        }


        $this->notification()->success(
            $title = 'تم إنشاء المنتج بنجاح',
            $description = 'تم إنشاء المنتج الخاص بك بنجاح.'
        );
        $this->dispatch('dashboard-sheet-bar-close');
        $this->reset();
    }

    public function removeCoverImg()
{
    if ($this->cover_img) {
        Storage::disk('public')->delete($this->cover_img);

        $this->cover_img = '';
    }

    $this->notification()->success(
        $title = 'تم حذف صورة الغلاف',
        $description = 'تم حذف صورة الغلاف بنجاح.'
    );
}

public function removePrevImg($index)
{
    // Check if the index is valid
    if (isset($this->prev_imgs[$index])) {
        // Get the image path
        $imagePath = $this->prev_imgs[$index];

        // Delete the image from storage
        Storage::disk('public')->delete($imagePath);

        // Remove the image from the array
        unset($this->prev_imgs[$index]);

        // Reset the array keys to avoid gaps
        $this->prev_imgs = array_values($this->prev_imgs);

        // Optionally, show a success notification
        $this->notification()->success(
            $title = 'تم حذف الصورة السابقة',
            $description = 'تم حذف الصورة السابقة بنجاح.'
        );
    }
}

    public function cancelProduct()
    {
        $this->reset();
    }


    public function selectColor($color)
    {
        // Check if the color is already in the list
        if (!in_array($color, $this->selectedColors)) {
            $this->selectedColors[] = $color; // Add the color to the list
        }
    }

    public function removeColor($color)
    {
        // Remove the color from the list
        $this->selectedColors = array_diff($this->selectedColors, [$color]);
    }


    public function render()
    {
        $categories = Category::select('id', 'name')->get();
        return view('livewire.create-products',['categories' => $categories, 'Colors' => $this->selectedColors]);
    }
}

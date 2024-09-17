<?php
namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use WireUi\Traits\Actions;


class MakeCategory extends Component
{
    use Actions;
    use WithFileUploads;

    public $name = '';
    public $description = '';
    public $cover_img;

    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'nullable|string|max:1000',
        'cover_img' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // 2MB Max
    ];

    protected $messages = [
        'name.required' => 'يرجى إدخال اسم الفئة.',
        'name.string' => 'يجب أن يكون اسم الفئة نصاً.',
        'name.max' => 'يجب أن يكون اسم الفئة أقل من 255 حرفاً.',
        'description.string' => 'يجب أن تكون وصف الفئة نصاً.',
        'description.max' => 'يجب أن يكون وصف الفئة أقل من 1000 حرف.',
        'cover_img.image' => 'يجب أن تكون صورة غلاف الفئة صورة.',
        'cover_img.mimes' => 'يجب أن تكون صورة غلاف الفئة من نوع jpeg، png، أو jpg.',
        'cover_img.max' => 'يجب أن لا تتجاوز صورة غلاف الفئة 2 ميجابايت.',
    ];

    public function createCategory()
    {
        $this->validate(); // Apply validation rules

        $coverImagePath = null;
        if ($this->cover_img) {
            $coverImagePath = $this->cover_img->store('cover_images', 'public');
        }

        Category::create([
            'name' => $this->name,
            'description' => $this->description,
            'cover_img' => $coverImagePath,
            'slug' => Str::slug($this->name),
        ]);

        // Reset form fields
        $this->reset();
        $this->dispatch('category-side-bar-close');
        $this->notification()->success(
            $title = '  تم إنشاء الفئة بنجاح.',
            $description =  'تم إنشاء الفئة بنجاح ويمكنك الآن إضافة منتجات لها.'
        );
    }

    public function render()
    {
        return view('livewire.make-category');
    }
}

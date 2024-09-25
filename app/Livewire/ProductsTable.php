<?php
namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;

class ProductsTable extends Component
{
    use Actions, WithPagination;

    public $search = "";
    public $filter = "";
    public $selectedProducts = [];
    public $order = "desc";

    protected $queryString = [
        'search' => ['as' => 'search_query'],
        'filter' => ['as' => 'filter_query'],
        'order' => ['as' => 'order_query']
    ];

    public function deleteProduct($id)
    {
        // Use findOrFail for better performance and error handling
        Product::findOrFail($id)->delete();
        $this->dispatch('close-product-delete-model');

        $this->notification()->success(
            title: 'تم حذف المنتج بنجاح',
            description: 'تم حذف المنتج المحدد.'
        );
    }

    public function saveCsvProductsFile()
    {
        $this->validate([
            'csvFile' => 'required|mimes:csv,txt|max:2048',
        ]);

        try {
            $filePath = $this->csvFile->getRealPath();
            $file = fopen($filePath, 'r');
            fgetcsv($file); // Skip the header row

            // Prepare an array to hold products
            $productsToInsert = [];

            while (($row = fgetcsv($file)) !== false) {
                $productsToInsert[] = [
                    'name' => $row[0],
                    'description' => $row[1],
                    'cover_img' => $row[2],
                    'prev_imgs' => $row[3],
                    'quantity' => $row[4],
                    'rating' => $row[5],
                    'sizes' => $row[6],
                    'colors' => $row[7],
                    'shipping' => $row[8],
                    'category_id' => $row[9],
                    'slug' => Str::slug($row[0]),
                    'created_at' => now(), // Adding timestamps
                    'updated_at' => now(),
                ];
            }

            fclose($file);

            // Use insert for batch processing
            Product::insert($productsToInsert);

            $this->notification()->success(
                title: 'تم رفع الملف بنجاح',
                description: 'تم استيراد المنتجات من ملف CSV بنجاح.'
            );
        } catch (\Exception $e) {
            $this->notification()->error(
                title: 'فشل الرفع',
                description: 'حدث خطأ أثناء استيراد المنتجات: ' . $e->getMessage()
            );
        }
    }

    public function deleteSelectedProducts()
    {
        if ($this->selectedProducts) {
            Product::destroy($this->selectedProducts); // Faster delete
            $this->reset('selectedProducts');
            $this->notification()->success(
                title: 'تم الحذف بنجاح',
                description: 'تم حذف المنتجات المحددة بنجاح.'
            );
        }
    }

    public function exportSelectedProducts()
    {
        if ($this->selectedProducts) {
            return response()->streamDownload(function () {
                $products = Product::findMany($this->selectedProducts);
                $output = fopen('php://output', 'w');
                fputcsv($output, ['name', 'description', 'price', 'quantity', 'sizes', 'colors', 'category_id']);

                foreach ($products as $product) {
                    fputcsv($output, [
                        $product->name,
                        $product->description,
                        $product->price,
                        $product->quantity,
                        $product->sizes,
                        $product->colors,
                        $product->category_id,
                    ]);
                }
                fclose($output);
            }, 'selected_products.csv', ['Content-Type' => 'text/csv']);
        }

        $this->notification()->success(
            title: 'تم التصدير بنجاح',
            description: 'تم تصدير المنتجات المحددة بنجاح.'
        );
    }

    public function setFilter($filter)
    {
        $this->filter = $filter;
        $this->resetPage();
    }

    public function toggleOrder()
    {
        $this->order = $this->order === "asc" ? "desc" : "asc";
    }

    public function render()
    {
        $productsQuery = Product::with('category');

        if ($this->search) {
            $productsQuery->where('name', 'like', '%' . $this->search . '%');
        }

        // Apply filter
        if ($this->filter) {
            switch ($this->filter) {
                case 'category':
                    $productsQuery->orderBy('category_id');
                    break;
                case 'price':
                    $productsQuery->orderBy('price');
                    break;
                case 'quantity':
                    $productsQuery->orderBy('quantity');
                    break;
                case 'date':
                    $productsQuery->orderBy('created_at');
                    break;
            }
        }

        // Apply order
        $productsQuery->orderBy('created_at', $this->order);
        $selectedFilter = $this->filter;

        $products = $productsQuery->paginate(9);
        return view('livewire.products-table', compact('products', 'selectedFilter'));
    }
}

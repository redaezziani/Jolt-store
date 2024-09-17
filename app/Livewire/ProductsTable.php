<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;


class ProductsTable extends Component
{
    use Actions;
    use WithPagination;

    public $search = "";

    protected $queryString = ['search'];

    public function  deleteProduct($id)
    {
        // first check if the product exists
        if (Product::find($id)) {
            // if it exists, delete it
            Product::find($id)->delete();
            $this->dispatch('close-product-delete-model');
        }

        $this->notification()->success(
            $title = 'تم إنشاء الخصم بنجاح',
            $description = 'تم إنشاء الخصم الخاص بك بنجاح'
        );
        $this->dispatch('close-product-delete-model');
    }
    public function saveCsvProductsFile()
    {
        try {
            // Validate the uploaded file
            $this->validate([
                'csvFile' => 'required|mimes:csv,txt|max:2048', // Accepts CSV files with a max size of 2MB
            ]);

            // Read the file
            $filePath = $this->csvFile->getRealPath();
            $file = fopen($filePath, 'r');

            // Skip the header row (optional)
            fgetcsv($file);

            // Process each row in the CSV
            while (($row = fgetcsv($file)) !== false) {
                // Assuming CSV columns match the fillable attributes in this order:
                // name, description, cover_img, prev_imgs, quantity, rating, sizes, colors, shipping, category_id
                Product::create([
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
                    'slug' => Str::slug($row[0]), // Generate slug from the product name
                ]);
            }

            // Close the file
            fclose($file);

            // Notification for success
            $this->notification()->success(
                $title = 'تم رفع الملف بنجاح',
                $description = 'تم استيراد المنتجات من ملف CSV بنجاح.'
            );
        } catch (\Exception $e) {
            // Handle the error
            $this->notification()->error(
                $title = 'فشل الرفع',
                $description = 'حدث خطأ أثناء استيراد المنتجات: ' . $e->getMessage()
            );
        }
    }

    public function downloadCsvProductsFile()
    {
        try {
            // Set headers for the CSV file
            $headers = ['name', 'description', 'cover_img', 'prev_imgs', 'quantity', 'rating', 'sizes', 'colors', 'shipping', 'category_id', 'slug'];

            return response()->streamDownload(function () use ($headers) {
                // Open a temporary output stream
                $output = fopen('php://output', 'w');

                // Add UTF-8 BOM to the CSV file
                fwrite($output, "\xEF\xBB\xBF");

                // Output the headers
                fputcsv($output, $headers);

                // Fetch all products from the database
                $products = Product::all();

                // Output each product's data as a row in the CSV
                foreach ($products as $product) {
                    fputcsv($output, [
                        $product->name,
                        $product->description,
                        $product->cover_img,
                        $product->prev_imgs,
                        $product->quantity,
                        $product->rating,
                        $product->sizes,
                        $product->colors,
                        $product->shipping,
                        $product->category_id,
                        $product->slug,
                    ]);
                }

                // Close the output stream
                fclose($output);
            }, 'products.csv', [
                'Content-Type' => 'text/csv; charset=UTF-8',
                'Content-Disposition' => 'attachment; filename="products.csv"',
            ]);
        } catch (\Exception $e) {
            // Handle the error
            $this->notification()->error(
                $title = 'فشل التنزيل',
                $description = 'حدث خطأ أثناء تنزيل المنتجات: ' . $e->getMessage()
            );
        }
    }


    public function deleteAllProducts()
    {

        Product::truncate();
    }

    public function render()
    {
        if ($this->search) {
            $products = Product::where('name', 'like', '%' . $this->search . '%')->paginate(9);
        } else {
            $products = Product::paginate(9);
        }
        return view('livewire.products-table', compact('products'));
    }
}

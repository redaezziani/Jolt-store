<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Resend\Laravel\Facades\Resend;
class CreateOrder extends Component
{
    public $firstname;
    public $lastname;
    public $phone;
    public $city;
    public $address;
    public $zipCode;
    public $cartItems = [];
    public $total = 0;

    public function mount()
    {
        // Redirect if user is not authenticated

        $this->loadCartItems();


    }

    public function loadCartItems()
    {
        if (auth()->check()) {
            $cart = Cart::where('user_id', auth()->id())->first();
            if ($cart) {
                $this->cartItems = $cart->items;
                $this->calculateTotal();
            }
        }
    }

    public function calculateTotal()
    {
        $this->total = 0; // Reset the total before recalculating
        foreach ($this->cartItems as $item) {
            $this->total += floatval($item->price) * $item->quantity;
        }
    }

    public function createOrder()
    {
        $this->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'city' => 'required|string|max:255',
            'address' => 'required|string',
        ]);

        // Create the order if the user is authenticated
        if (auth()->check()) {
            $order = Order::create([
                'user_id' => auth()->id(),
                'firstname' => $this->firstname,
                'lastname' => $this->lastname,
                'total' => $this->total,
                'status' => 'pending',
                'phone' => $this->phone,
                'city' => $this->city,
                'zip_code' => $this->zipCode,
                'address' => $this->address,
            ]);

            // Create order items
            foreach ($this->cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                    'size' => $item->size, // If applicable
                    'color' => $item->color, // If applicable
                ]);

                // lets increment the product quantity

                $product = Product::find($item->product_id);
                if ($product)
                    $product->increment('quantity', $item->quantity);
                 }
            }

            // Clear the cart after order creation

            Resend::emails()->send([
                'from' => 'Acme <onboarding@resend.dev>',
                'to' => 'klausdev2@gmail.com',
                'subject' => 'تأكيد الطلب الخاص بك',
              'html' => "
    <div style='font-family: Arial, sans-serif; color: #333; line-height: 1.6; padding: 20px; max-width: 600px; margin: auto; border: 1px solid #ddd; direction: rtl;
    text-align: right;'>
        <!-- Header -->
        <div style='background-color: #059669; padding: 20px; text-align: center;'>
            <h1 style='color: #ffffff; margin: 0;'>شكراً لطلبك من متجر جولت</h1>
        </div>

        <!-- Greeting -->
        <p style='margin-top: 20px;'>مرحباً {$this->firstname},</p>
        <p>نشكرك على إتمام طلبك معنا. طلبك يحمل رقم <strong style='color: #059669;'>{$order->id}</strong> وقد تم تأكيده بنجاح. تفاصيل طلبك كما يلي:</p>

        <!-- Order Details -->
        <table style='width: 100%; border-collapse: collapse; margin-top: 20px;'>
            <thead>
                <tr>
                    <th style='border-bottom: 2px solid #059669; padding: 10px 0; text-align: left;'>المنتج</th>
                    <th style='border-bottom: 2px solid #059669; padding: 10px 0; text-align: center;'>الكمية</th>
                    <th style='border-bottom: 2px solid #059669; padding: 10px 0; text-align: center;'>السعر</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through each order item -->
                " . $this->cartItems->map(function ($item) {
                    return "
                    <tr>
                        <td style='padding: 10px 0; border-bottom: 1px solid #ddd;'>{$item->product->name}</td>
                        <td style='padding: 10px 0; text-align: center; border-bottom: 1px solid #ddd;'>{$item->quantity}</td>
                        <td style='padding: 10px 0; text-align: center; border-bottom: 1px solid #ddd;'>{$item->price} درهم</td>
                    </tr>";
                })->implode('') . "
            </tbody>
        </table>

        <!-- Total Price -->
        <p style='text-align: right; margin-top: 20px; font-weight: bold; color: #059669;'>المجموع الكلي: {$this->total} درهم</p>

        <!-- Additional Information -->
        <p>سنقوم بإعلامك عند شحن الطلب. إذا كان لديك أي استفسار، لا تتردد في الاتصال بنا عبر البريد الإلكتروني أو الهاتف.</p>
        <p>عنوان الشحن: {$this->address}, {$this->city}, {$this->zipCode}</p>
        <p>هاتف: {$this->phone}</p>

        <!-- Closing and Signature -->
        <p>مع تحيات فريقنا،</p>
        <p style='font-weight: bold; color: #059669;'>جولت</p>

        <!-- Footer -->
        <div style='background-color: #f4f4f4; padding: 10px; text-align: center; margin-top: 20px;'>
            <p style='font-size: 0.9em; color: #666;'>© 2024 جولت. جميع الحقوق محفوظة.</p>
            <p style='font-size: 0.9em; color: #666;'>العنوان: شارع التجارة، المدينة، الدولة</p>
        </div>
    </div>
",

            ]);
            // reste the inputs
            $this->clearCart();
            return redirect()->route('order-success');
        }
    }

    public function clearCart()
    {
        $cart = Cart::where('user_id', auth()->id())->first();
        if ($cart) {
            $cart->items()->delete(); // Ensure this correctly deletes the items
        }
    }

    public function render()
    {
        return view('livewire.create-order', [
            'cartItems' => $this->cartItems,
            'total' => $this->total,
        ]);
    }
}


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
    // lets add a var to check if any of the items in the cart has a Paid Shipping
    public $hasPaidShipping = false;

    protected $rules = [
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'city' => 'required|string|max:255',
        'address' => 'required|string',
    ];

    protected $messages = [
        'firstname.required' => 'الاسم الأول مطلوب.',
        'firstname.string' => 'يجب أن يكون الاسم الأول نصًا.',
        'firstname.max' => 'يجب ألا يتجاوز الاسم الأول 255 حرفًا.',

        'lastname.required' => 'اسم العائلة مطلوب.',
        'lastname.string' => 'يجب أن يكون اسم العائلة نصًا.',
        'lastname.max' => 'يجب ألا يتجاوز اسم العائلة 255 حرفًا.',

        'phone.required' => 'رقم الهاتف مطلوب.',
        'phone.string' => 'يجب أن يكون رقم الهاتف نصًا.',
        'phone.max' => 'يجب ألا يتجاوز رقم الهاتف 20 حرفًا.',

        'city.required' => 'المدينة مطلوبة.',
        'city.string' => 'يجب أن تكون المدينة نصًا.',
        'city.max' => 'يجب ألا تتجاوز المدينة 255 حرفًا.',

        'address.required' => 'العنوان مطلوب.',
        'address.string' => 'يجب أن يكون العنوان نصًا.',
    ];

    public function mount()
    {
        $this->loadCartItems();
        $this->calculateTotal();
    }

    public function loadCartItems()
{
    if (auth()->check()) {
        $cart = Cart::where('user_id', auth()->id())->first();
        if ($cart) {
            $this->cartItems = $cart->items;
        }

        foreach ($this->cartItems as $item) {
            if ($item->product->shipping == 'Paid Shipping') {
                $this->hasPaidShipping = true;
                break;
            }
        }

        // Calculate total after loading items and checking for shipping conditions
        $this->calculateTotal();
    }
}


    public function calculateTotal()
    {
        $this->total = 0;
        foreach ($this->cartItems as $item) {
            $this->total += floatval($item->price) * $item->quantity;
        }
    }



    public function PayOnDelivery()
    {
        $this->validate();
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

        // Resend::emails()->send([
        //     'from' => 'Acme <onboarding@resend.dev>',
        //     'to' => 'klausdev2@gmail.com',
        //     'subject' => 'تأكيد الطلب الخاص بك',
        //     'html' => $this->generateOrderEmail($order),
        // ]);
        // // reste the inputs
        $this->clearCart();
        $this->dispatch('orderCreated');
        // return redirect()->route('order-success');
    }

    // function generateOrderEmail($order) {
    //     // Start email content
    //     return "
    //     <!doctype html>
    //     <html lang='ar'>
    //         <head>
    //             <meta charset='UTF-8' />
    //             <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    //             <style>
    //                 @import url('https://fonts.googleapis.com/css2?family=Zain:wght@200;300;400;700;800;900&display=swap');
    //                 body {
    //                     font-family: 'Zain', sans-serif;
    //                     display: flex;
    //                     justify-content: center;
    //                     align-items: center;
    //                     min-height: 100vh;
    //                     margin: 0;
    //                 }
    //             </style>
    //             <title>تفاصيل الطلب</title>
    //         </head>
    //         <body>
    //             <div style='color: #333; line-height: 1.6; padding: 20px; max-width: 600px; margin: auto; border: 1px solid #ddd; direction: rtl; text-align: right; border-radius: 10px;'>
    //                 <div style='width: 100%; display: flex; align-items: flex-start; justify-content: flex-start;'>
    //                     <a style='color: #3b6bd3; font-weight: 600; display: flex; gap: 0; align-items: center; justify-content: flex-start; font-size: 1.25rem;' href='{{ route('home') }}'>
    //                         <svg style='width: 2rem; height: 2rem; color: #3b6bd3;' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' viewBox='-279 370.5 52.5 52.5' fill='currentColor' xml:space='preserve'>
    //                             <g>
    //                                 <path d='M-252.7,371.2c-14.1,0-25.5,11.4-25.5,25.5c0,14,11.5,25.5,25.5,25.5c14.1,0,25.5-11.4,25.5-25.5 C-227.2,382.7-238.7,371.2-252.7,371.2L-252.7,371.2z M-268.3,381.2c4.1-4.1,9.7-6.4,15.5-6.4s11.4,2.3,15.5,6.4 c4.1,4.1,6.4,9.7,6.4,15.5c0,3.1-0.6,6.1-1.9,8.9c-0.6,1.4-2.6,1.6-3.4,0.3l-0.9-1.4c-0.9-1.4-2.4-2.2-4-2.2l0,0 c-1.6,0-3.2,0.8-4,2.2l-0.7,1.2c-0.4,0.6-1,1-1.8,1c-0.7,0-1.4-0.4-1.8-1l-9.5-15.1c-0.7-1.1-1.9-1.8-3.3-1.8h0 c-1.3,0-2.6,0.7-3.3,1.8l-6.6,10.6c-0.6,1-2.2,0.7-2.4-0.5c-0.2-1.3-0.3-2.5-0.3-3.8C-274.7,390.9-272.4,385.3-268.3,381.2 L-268.3,381.2z' />
    //                                 <path d='M-240.9,399.9c2.9,0,5.3-2.4,5.3-5.3c0-2.9-2.4-5.3-5.3-5.3s-5.3,2.4-5.3,5.3C-246.2,397.5-243.8,399.9-240.9,399.9z' />
    //                             </g>
    //                         </svg>
    //                         <span style='margin-right: 0.5rem;'>أطلس</span>
    //                     </a>
    //                 </div>
    //                 <p style='margin-top: 20px;'>مرحباً
    //                     <strong style='color: #3b6bd3;'>$order->firstname $order->lastname</strong>
    //                 </p>
    //                 <p>نشكرك على إتمام طلبك معنا. طلبك يحمل رقم <strong style='color: #3b6bd3;'>
    //                         $order->id</strong> وقد تم تأكيده بنجاح. تفاصيل طلبك كما يلي:</p>

    //                 <!-- Order Details -->
    //                 <table style='width: 100%; border-collapse: collapse; margin-top: 20px;'>
    //                     <thead>
    //                         <tr style='background-color: #f1f5f9;'>
    //                             <th style='border-bottom: 2px solid #3b6bd3; padding: 10px 0; text-align: start;'>المنتج</th>
    //                             <th style='border-bottom: 2px solid #3b6bd3; padding: 10px 0; text-align: center;'>الكمية</th>
    //                             <th style='border-bottom: 2px solid #3b6bd3; padding: 10px 0; text-align: center;'>السعر</th>
    //                         </tr>
    //                     </thead>
    //                     <tbody>";

    //     foreach ($cartItems as $item) {
    //         $productName = htmlspecialchars($item['name']);
    //         $quantity = htmlspecialchars($item['quantity']);
    //         $price = htmlspecialchars($item['price']);
    //         $emailContent .= "
    //                         <tr>
    //                             <td style='padding: 10px 0; border-bottom: 1px solid #ddd;'>$productName</td>
    //                             <td style='padding: 10px 0; text-align: center; border-bottom: 1px solid #ddd;'>$quantity</td>
    //                             <td style='padding: 10px 0; text-align: center; border-bottom: 1px solid #ddd;'>$price درهم</td>
    //                         </tr>";
    //     }

    //     $emailContent .= "
    //                     </tbody>
    //                 </table>

    //                 <!-- Total Price -->
    //                 <p style='text-align: right; margin-top: 20px; font-weight: bold; color: #3b6bd3;'>المجموع الكلي:
    //                 {{ $total }}
    //                 درهم</p>

    //                 <!-- Additional Information -->
    //                 <p style='margin-top: 20px; color: #4a5568;'>سنقوم بإعلامك عند شحن الطلب. إذا كان لديك أي استفسار، لا تتردد في الاتصال بنا عبر البريد الإلكتروني أو الهاتف.</p>
    //                 <p><strong>عنوان الشحن</strong>:
    //                     {{ $order->address }}, {{ $order->city }}
    //                 </p>
    //                 <p><strong>هاتف</strong>:
    //                     {{ $order->phone }}
    //                 </p>

    //                 <!-- Closing and Signature -->
    //                 <p>مع تحيات فريقنا،</p>
    //                 <p style='font-weight: bold; color: #3b6bd3;'>فريق أطلس</p>

    //                 <!-- Footer -->
    //                 <div style='background-color: #f4f4f4; padding: 10px; text-align: center; margin-top: 20px;'>
    //                     <p style='font-size: 0.9em; color: #666;'>© 2024 <strong style='color: #3b6bd3;'>أطلس</strong>. جميع الحقوق محفوظة.</p>
    //                     <p style='font-size: 0.9em; color: #666;'>العنوان: شارع التجارة، المدينة، الدولة</p>
    //                 </div>
    //             </div>
    //         </body>
    //     </html>";
    // }


    public function clearCart()
    {
        $cart = Cart::where('user_id', auth()->id())->first();
        if ($cart) {
            $cart->items()->delete(); // Ensure this correctly deletes the items
        }
    }

    public function PayWithStripe()
    {
        $this->validate();

        // Create the line items for the order
        $lineItems = [];
        foreach ($this->cartItems as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'MAD',
                    'product_data' => [
                        'name' => $item->product->name,
                        // get the image fron the storage cover_image
                        'images' => [asset('storage/' . $item->product->cover_img)],
                    ],
                    'unit_amount' => $item->price * 100,
                ],
                'quantity' => $item->quantity,
            ];
        }

        if (auth()) {
            \Stripe\Stripe::setApiKey(config('stripe.sk'));

            // Create a new Stripe Checkout Session
            $session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => $lineItems,
                'mode' => 'payment',
                'success_url' => route('order-success'),
                'cancel_url' => route('home'),

            ]);

            // Redirect to the Checkout Session
            return redirect()->to($session->url);
        }
    }

    public function render()
    {
        return view('livewire.create-order', [
            'cartItems' => $this->cartItems,
            'total'=>$this->total,
            'hasPaidShipping' => $this->hasPaidShipping,
        ]);
    }
}

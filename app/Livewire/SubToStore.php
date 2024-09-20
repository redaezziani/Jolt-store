<?php

namespace App\Livewire;

use Livewire\Component;
use Resend\Laravel\Facades\Resend;

class SubToStore extends Component
{
    public $email = '';

    // Custom validation messages in Arabic
    protected $messages = [
        'email.required' => 'البريد الإلكتروني مطلوب.',
        'email.email' => 'يرجى إدخال بريد إلكتروني صالح.',
    ];

    // Function to validate on input change
    public function updated($field)
    {
        $this->validateOnly($field, [
            'email' => 'required|email',
        ]);
    }

    // Function to handle form submission
    public function subscribe()
    {
        $this->validate([
            'email' => 'required|email',
        ]);

        // // Logic to send the subscription email
        // Resend::emails()->send([
        //     'from' => 'Acme <onboarding@resend.dev>',
        //     'to' => $this->email,
        //     'subject' => 'شكراً لاشتراكك في متجرنا',
        //     'html' => "
        //     <!doctype html>
        //     <html lang='ar'>
        //         <head>
        //             <meta charset='UTF-8' />
        //             <meta name='viewport' content='width=device-width, initial-scale=1.0' />
        //             <style>
        //                 @import url('https://fonts.googleapis.com/css2?family=Zain:wght@200;300;400;700;800;900&display=swap');
        //                 body {
        //                     font-family: 'Zain', sans-serif;
        //                 }
        //             </style>
        //             <title>اشتراكك في متجرنا</title>
        //         </head>
        //         <body style='direction: rtl; text-align: right;'>
        //             <div style='color: #333; line-height: 1.6; padding: 20px; max-width: 600px; margin: auto; border: 1px solid #ddd; border-radius: 10px;'>
        //                 <!-- Header -->
        //                 <div style='background-color: #059669; padding: 20px; text-align: center; border-radius: 5px;'>
        //                     <h1 style='color: #ffffff; margin: 0;'>شكراً لاشتراكك في متجرنا!</h1>
        //                 </div>

        //                 <!-- Greeting -->
        //                 <p style='margin-top: 20px;'>مرحباً،</p>
        //                 <p>نشكر لك اهتمامك بمتجرنا. لقد تم تأكيد اشتراكك بنجاح. ستتلقى آخر الأخبار والعروض الحصرية على بريدك الإلكتروني قريباً.</p>

        //                 <!-- Closing -->
        //                 <p>مع تحيات فريق المتجر،</p>
        //                 <p style='font-weight: bold; color: #059669;'>متجرنا</p>

        //                 <!-- Footer -->
        //                 <div style='background-color: #f4f4f4; padding: 10px; text-align: center; margin-top: 20px;'>
        //                     <p style='font-size: 0.9em; color: #666;'>© 2024 متجرنا. جميع الحقوق محفوظة.</p>
        //                 </div>
        //             </div>
        //         </body>
        //     </html>
        //     ",
        // ]);

        // For now, just dump the email for testing purposes
        dd($this->email);
    }

    public function render()
    {
        return view('livewire.sub-to-store');
    }
}

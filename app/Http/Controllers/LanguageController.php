<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function switchLanguage($locale)
    {
        if (in_array($locale, ['en', 'ar'])) { // You can add more languages here
            session()->put('locale', $locale);
            app()->setLocale($locale);
        }

        return redirect()->back();
    }
}

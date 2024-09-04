<?php
namespace App\Http\Livewire;



use Livewire\Component;



class LanguageSwitcher extends Component

{

    public $language = 'en';



    public function switchLanguage($lang)

    {

        $this->language = $lang;
        session()->put('locale', $lang);

        app()->setLocale($lang);

    }



    public function render()

    {

        return view('livewire.language-switcher');

    }

}

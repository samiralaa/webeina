<?php

namespace App\View\Components;

use Closure;
use App\Models\Footer;
use App\Models\Service;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class FooterLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public $footer;
    public $services;
    public function __construct()
    {
        // اجلب أول صف من البيانات
        // $footer = Footer::first();
        // if ($footer) {
        //     // قم بفك تشفير الحقول المخزنة كـ JSON
        //     $footer->description = json_decode($footer->description, true);
        //     $footer->title = json_decode($footer->title, true);
        //     $footer->location = json_decode($footer->location, true);
        //     $footer->page = json_decode($footer->page, true);
        // }

        // $this->footer = $footer;
        $services =   $this->services = Service::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.footer-layout',
        [
            'footer' => $this->footer,
            'services'=>$this->services
        ],
    );
    }
}

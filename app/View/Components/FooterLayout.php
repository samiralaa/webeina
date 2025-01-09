<?php

namespace App\View\Components;

use App\Models\Footer;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FooterLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public $footer;
    public function __construct()
    {
        // اجلب أول صف من البيانات
        $footer = Footer::first();
        if ($footer) {
            // قم بفك تشفير الحقول المخزنة كـ JSON
            $footer->description = json_decode($footer->description, true);
            $footer->title = json_decode($footer->title, true);
            $footer->location = json_decode($footer->location, true);
            $footer->page = json_decode($footer->page, true);
        }

        $this->footer = $footer;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.footer-layout',
        [
            'footer' => $this->footer,
        ],
    );
    }
}

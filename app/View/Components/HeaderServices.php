<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Service; // Replace with your model

class HeaderServices extends Component
{
    public $services;

    public function __construct()
    {
        // Fetch all services from the database
        $this->services = Service::orderBy('order_by', 'asc');
    }

    public function render()
    {
        // Pass the services variable to the component Blade view
        return view('components.header-services', [
            'services' => $this->services
        ]);
    }
}

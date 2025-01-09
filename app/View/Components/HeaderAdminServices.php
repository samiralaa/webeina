<?php

namespace App\View\Components;

use App\Models\Service;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HeaderAdminServices extends Component
{
    public $services;

    public function __construct()
    {
        // Fetch all services from the database
        $this->services = Service::all();
    }

   

    public function render()
    {
        // Pass the services variable to the component Blade view
        return view('components.header-admin-services', [
            'services' => $this->services
        ]);
    }
}

<?php

namespace App\Services\Footer;

use App\Models\Footer;
use App\Traits\CrudTrait;
use Illuminate\Support\Facades\Storage;

class FooterService
{
    use CrudTrait;
    public $model;
    public function __construct()
    {
        $this->model = new Footer(); // Set the model for the CrudTrait
    }

    public function formatData(array $data)
    {
        if (isset($data['logo'])) {
            $data['logo'] = $data['logo']->store('logos', 'public');
        }

        $data['description'] = json_encode($data['description']);
        $data['title'] = json_encode($data['title']);
        $data['page'] = isset($data['page']) ? json_encode($data['page']) : null;
        $data['location'] = json_encode($data['location']);

        return $data;
    }

    public function show($id)
    {
        $footer = $this->model->find($id);
    }

    public function updateLogo(Footer $footer, $logo)
    {
        if ($footer->logo) {
            Storage::disk('public')->delete($footer->logo);
        }

        return $logo->store('logos', 'public');
    }
}

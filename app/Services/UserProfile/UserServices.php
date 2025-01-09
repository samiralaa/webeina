<?php

namespace App\Services\UserProfile;

use App\Models\Package;
use App\Models\Service;
use App\Traits\CrudTrait;

class UserServices
{
    use CrudTrait;
    protected $service;
    protected $package;

    public function __construct(Service $service, Package $package)
    {
        $this->service = $service;
        $this->package = $package;
    }

    public function getAllServices()
    {
        return $this->index($this->service, ['id', 'name', 'description', 'icon']);
    }

    public function getPackageServices()
    {
        return $this->index($this->package, [
            'title',
            'sun_title',
            'description',
            'price',
            'features',
            'image',
            'id',
            'service_id',
            'subscription_time'
        ]);
    }
}

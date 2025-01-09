<?php

namespace App\Services\RequestPackage;


use App\Models\PackageRequest;
use App\Traits\CrudTrait;

class RequestPackageService
{
    use CrudTrait;

    protected $model;

    public function __construct(PackageRequest $packageRequest)
    {
        $this->model = $packageRequest;
    }

    public function getAllPackages($select = ['*'])
    {
        return $this->indexWithRelation(
            $this->model,
            ['user', 'package'],
            $select
        );
    }
    

    public function getPackageById($id, $select = ['*'])
    {
        return $this->findById($this->model, $id, $select); // Call the CrudTrait's show method
    }

    public function createPackageRequest($data)
    {
        return $this->store($data ,$this->model); // Call the CrudTrait's store method
    }
}

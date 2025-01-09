<?php

namespace App\Services\CustomFildData;

use App\Models\CustomFildData;
use App\Traits\CrudTrait;

class CustomFildDataService
{
    use CrudTrait;
    public $model;

    public function __construct()
    {
        $this->model = new CustomFildData();
    }

    public function getAllCustomFildData()
    {
        return $this->indexWithRelation($this->model,$relations = ['custom_filds'],$selects = ['*']);
    }
    public function createCustomFildData($request)
    {

        $data = $this->store($request, $this->model);
      return $data;
    }
}

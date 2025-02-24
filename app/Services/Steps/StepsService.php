<?php

namespace App\Services\Steps;


use App\Models\Steps;
use App\Traits\CrudTrait;

class StepsService
{
    use CrudTrait;

    protected $model;

    public function __construct(Steps $steps)
    {
        $this->model = $steps;
    }

    public function getAllSteps($select = ['*'])
    {
        return $this->indexWithRelation(
            $this->model,
            ['service'],
            $select
        );
    }


    public function getStepsById($id, $select = ['*'])
    {
        return $this->findById($this->model, $id, $select); // Call the CrudTrait's show method
    }

    public function createStepsRequest($data)
    {
        return $this->store($data ,$this->model); // Call the CrudTrait's store method
    }
}

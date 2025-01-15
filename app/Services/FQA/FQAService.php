<?php

namespace App\Services\FQA;


use App\Models\FAQ;
use App\Traits\CrudTrait;

class FQAService
{
    use CrudTrait;

    protected $model;

    public function __construct(FAQ $model)
    {
        $this->model = $model;
    }

    public function getAllFAQ()
    {
        return $this->index($this->model, ['id', 'question', 'answer']);
    }

    public function create($data)
    {
        return $this->store($data, $this->model);
    }

    public function show($id)
    {
        return $this->findById($id, $this->model, ['id', 'question', 'answer']);
    }

    public function update($data, $id)
    {
        return $this->update($data, $this->model, $id);
    }

    public function destroy($id)
    {
        return $this->delete($this->model, $id);
    }
}

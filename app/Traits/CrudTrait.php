<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait CrudTrait
{
    private $crudModel;

    public function __construct(Model $model)
    {
        $this->crudModel = $model;
    }
    public function index($model, $select)
    {
        return $model->select($select)->get();
    }

    protected function indexWithRelation($model, array $relations, array $selects)
    {
        return $model::with($relations)->select($selects)->get();
    }

    public function store(array $data, $model)
    {
        return $model->create($data);
    }

    public function getAllByUsedWhereAndUsedRelation($relation, $where, $select)
    {
        return $this->model->with($relation)->where($where)->select($select)->get();
    }

    public function update(array $data, $model, $id)
    {
        return $model->where('id', $id)->update($data);
    }

    public function delete($model, $id)
    {
        return $model->where('id', $id)->delete();
    }

    public function findById($id, $model, $select)
    {
        return $model->select($select)->find($id);
    }
}

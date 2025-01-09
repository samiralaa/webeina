<?php

namespace App\Services\AttributeService;

use App\Models\Attribute;
use App\Traits\CrudTrait;

class AttributeService
{
    use CrudTrait;

    protected $model;

    public function __construct(Attribute $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        $select = ['*'];
        $relations = ['custom_filds'];
        return $this->indexWithRelation($this->model,$relations,$select)->unique('attributable_type');
    }
    public function save(array $data)
    {
        // Prepare the data for saving
        $attribute = Attribute::create([
            'attributable_type' => $data['attributable_type'],
            'field_type' => $data['field_type'],
            'is_required' => $data['is_required'],
            'show_in_table' => $data['show_in_table'],
            'key' => json_encode($data['key']),
            'options' => isset($data['options']) ? json_encode($data['options']) : null,
        ]);

        return $attribute;
    }

    // get by Model
    public function getByModel($model)
    {
        return $this->model->where('attributable_type', $model)->with('custom_filds')->get();
    }
    public function deleteById($id)
    {
        $attribute = $this->model->find($id);
        $attribute->delete();
        return $attribute;
    }
}

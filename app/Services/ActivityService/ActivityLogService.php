<?php

namespace App\Services\ActivityService;

use App\Models\ActivityLog;
use App\Traits\CrudTrait;
use Nette\Utils\Arrays;

class ActivityLogService
{
    use CrudTrait;
    protected $model;
    public function __construct(ActivityLog $model)
    {
        $this->model = $model;
    }
    public function storeActivity(array $data)
    {
        return $this->store($data, $this->model);
    }

    public function allActivities()
    {
        $relations = ['user', 'service'];
        $selects = ['id', 'details', 'action'];
        $data = $this->model->with('user','service')->paginate(10);
        return $data;


    }

    public function getActivityById($id)
    {
        return $this->findById($id, $this->model,['*']);
    }

    public function updateActivity($id, array $data)
    {
        return $this->update($data, $this->model,$id);
    }

    public function deleteActivity($id)
    {
        return $this->delete($this->model, $id);
    }


}

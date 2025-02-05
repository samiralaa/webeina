<?php

namespace App\Services\Projects;

use App\Repositories\model;
use App\Models\Project;
use App\Traits\CrudTrait;
use Illuminate\Support\Facades\DB;
use Exception;

class ProjectService
{
    use CrudTrait;
    protected $model;

    public function __construct(Project $model)
    {
        $this->model = $model;
    }

    public function getAllProjects()
    {
        $select = ['*'];
        $relations = ['images'];
        return $this->indexWithRelation($this->model, $relations, $select);
    }

    public function getProjectById($id)
    {
    }

    
    public function createProject(array $data)
    {

        return $this->store($data,$this->model);
    }

    // public function updateProject(Project $project, array $data)
    // {
    //     return $this->model->update($project, $data);
    // }

    // public function deleteProject(Project $project)
    // {
    //     return $this->model->delete($project);
    // }
}

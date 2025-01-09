<?php

namespace App\Services\SubmitServices;

use App\Models\Service;
use App\Models\SubmitService;
use App\Models\User;
use App\Traits\CrudTrait;

class SubmitServicesService
{
    use CrudTrait;

    protected $model;
    public function __construct(SubmitService $model)
    {
        $this->model = $model;
    }

    public function SubmitServicesStore($data)
    {

        $user_id = auth()->user()->id;

        return  $this->model->create([
            'service_id' => $data['service_id'],
            'user_id' => $user_id,
        ]);
    }
    public function getAllRequest()
    {
        return  User::with('services')->whereHas('services')->get();
    }

   
}

<?php
namespace App\Repositories\Service;


use App\Models\Service;
use App\Repositories\ServiceRepositoryInterface;

class ServiceRepository implements ServiceRepositoryInterface
{
    protected $model;

    public function __construct(Service $service)
    {
        $this->model = $service;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $service = $this->findById($id);
        $service->update($data);
        return $service;
    }

    public function delete($id)
    {
        $service = $this->findById($id);
        $service->delete();
        return true;
    }

   public function getServicesForUser($lang)
    {
        $authUser = auth()->user();
        return $authUser->services; // Fetches the services related to the authenticated user
    }
    public function deleteServicesForUser($service)
    {
        $authUser = auth()->user();
        return $authUser;
        return $authUser->services()->detach($service); // Removes a service from the authenticated user's services
    }
}

<?php

namespace App\Services\Content\Contact;

use App\Models\Contact as ContactUs;
use App\Traits\CrudTrait;

class ContactService
{
    use CrudTrait;
    public function __construct()
    {
        $this->model = new ContactUs();
    }

    public function getAll()
    {
        return $this->model->index();
    }
    public function getById($id)
    {
        return $this->model->find($id);
    }
    public function create($data)
    {
        return $this->model->create($data);
    }
    public function update($id, $data)
    {
        $contact = $this->getById($id);
        $contact->update($data);
        return $contact;
    }
    public function delete($id)
    {
        $contact = $this->getById($id);
        $contact->delete();
        return $contact;
    }
}

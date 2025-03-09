<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Service;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    protected $contact;
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }
    public function index()
    {

          $contacts = $this->contact->all();
        return view('admin.contact.index', compact('contacts'));
    }

    public function show($id)
    {
        $contact = $this->contact->find($id);
        return view('admin.contact.show', compact('contact'));
    }

    public function destroy($id)
    {
        $contact = $this->contact->find($id);
        $contact->delete();
        return redirect()->back();
    }
public function create()
{
    $serves = Service::get();
    return view('website.contact-us',compact('serves'));
}

    public function store()
    {

        $data = request()->all();
        if(isset($data['first_name'])){
            $data['name'] = request()->get('first_name') . ' ' . request()->get('last_name');
        }

        $this->contact->create($data);
        return redirect()->back()->with('success', 'Contact created successfully!');
    }
}

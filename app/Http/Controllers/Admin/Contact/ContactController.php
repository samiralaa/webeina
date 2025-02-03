<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact;
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
    return view('website.contact-us');
}

    public function store()
    {
        $data = request()->all();
        $this->contact->create($data);
        return redirect()->back()->with('success', 'Contact created successfully!');
    }
}

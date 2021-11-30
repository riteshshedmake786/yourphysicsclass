<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PayUservice\Exception;
use App\Contact;
use Session;

class ContactController extends Controller
{
    public function __construct(Contact $contact)
    {
        $this->exception = 'home';
        $this->contact = $contact;
    }

    public function contactList()
    {
        try{
            $contacts = $this->contact->getAllContactList();
            return view('dashboard.contact_list', compact('contacts'));
        }catch (\Exception $e){
            return redirect()->route($this->exception)->with('warning', $e->getMessage()); 
        }
    }

    public function contactDelete(Request $request, $cid)
    {
        try{
            $contact = Contact::findOrfail($cid);
            if($this->contact->deleteContact($contact, $request)){
                Session::flash('msg','Contact successfully delete');
                Session::flash('alert-class','success');
                return redirect()->route('contact-list');
            }else{
                Session::flash('error-msg','Unable to delete contact.');
                Session::flash('alert-class','danger');
                return redirect()->route('contact-list');
            }
        }catch (\Exception $e){
            return redirect()->route($this->exception)->with('warning', $e->getMessage()); 
        }
    }
}

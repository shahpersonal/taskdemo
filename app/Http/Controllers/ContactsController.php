<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Illuminate\Support\Facades\Auth;


class ContactsController extends Controller
{
    //
    public function create(Request $request)
    {
        //


            $contact  = Contact::create([
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'message'=>$request->input('message')

            ]);

        return back()->withInput()->with('success','Enquiry created successfully');
    }


}

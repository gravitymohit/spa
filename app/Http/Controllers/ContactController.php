<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all()->toArray();
       // echo "<pre>";print_r($contacts);die;
        return array_reverse($contacts);
    }

    public function store(Request $request)
    {
       // $image = $request->get('image');
       // echo "<pre>";print_r($image);die;
        $contact = new Contact([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'zip' => $request->input('zip'),

        ]);

       
        $contact->save();

        return response()->json('The book successfully added');
    }

}

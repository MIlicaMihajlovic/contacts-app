<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\ContactRequest;

use Illuminate\Http\Request;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Contact::paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request) //ovde smo injectovali request third way to validate data
    {   
        //first way to validate data
        // $validation = $this->validate(
        //     $request,
        //     [
        //         'first_name' => 'required',
        //         'last_name' => 'required',
        //         'email' => 'required|unique:contacts,email'
        //     ]
        // );
            //second way to validate data
        // $validation = $request->validate([
        //         'first_name' => 'required',
        //         'last_name' => 'required',
        //         'email' => 'required|unique:contacts,email'
        // ]);
        // dd($validation);
        return Contact::create(
            $request->only(['first_name', 'last_name', 'email'])
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact) //ovde je vec bindovao
    {
        return $contact;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(ContactRequest $request, Contact $contact) //model nam je bindovan Contact
    {
        $contact->update(
            $request->only(['first_name', 'last_name', 'email'])
        );

        return $contact; //returnujemo updatovan kontakt
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return $contact;
    }
}

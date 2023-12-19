<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\ContactUsMail;



class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // task 12
        return view('contact-us');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
              // task 12
    $messages=$this->validationMessages();

       $data=$request->validate([
        'name'=>  'required',
        'email'=> 'required',
        'subject'=> 'required',
        'message'=> 'required|min:20|max:100',
       ],$messages);

      Mail::to('neamaabdelzaher61@gmail.com')->send(new ContactUsMail($data));

      return redirect ('contact-us')->with('alert','send successfully');
 
     
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

          // task 12
    public function validationMessages(){

        return [
            "name.required"=> "Name is required",
            "email.required"=> " Email is required",
             "subject.required"=> "Subject is required",
             "message.required"=> "Message is required",
             "message.min"=> "Message should be more than 20 letter",
             "message.max"=> "Message should be less than 100 letter",
           

        ];
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\AppointmentConfirmation;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(ContactRequest $request)
    {
        // Store data in the database
        $contact = new Contact();
        $contact->ClientName = $request->input('ClientName');
        $contact->phone = $request->input('phone');
        $contact->mail = $request->input('mail');
        $contact->CoachName = null;
        $contact->chosen_datetime = null;

        $add = $contact->save();
        return $add
            ? redirect()->route('coach', ['id' => $contact->id])->with('success', 'Client Added Successfully')
            : redirect()->back()->with('error', 'Error occurred while saving.');
    }

    public function showCoachForm($id)
    {
        return view('coach', compact('id'));
    }

    public function saveAllData(Request $request, $id)
    {
        $contact = Contact::find($id);

        $contact->update([
            'CoachName'=> $request['CoachName'],
            'chosen_datetime'=>$request['chosen_datetime'],
        ]);

        return redirect()->route('success');
    }

    public function Thankyou()
    {
        return view("success");
    }
}


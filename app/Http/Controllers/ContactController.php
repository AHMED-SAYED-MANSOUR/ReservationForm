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

    public function storeInSession(ContactRequest $request)
    {
        // Store data from the first form in the session
        session()->put('firstFormData', [
            'ClientName' => $request->input('ClientName'),
            'phone' => $request->input('phone'),
            'mail' => $request->input('mail'),
        ]);

        return redirect()->route('coach')->with('success', 'Data from the first form stored successfully.');
    }

    public function showCoachForm()
    {
        // Retrieve data from the session
        $firstFormData = session()->get('firstFormData');

        // Pass the data to the coach form
        return view('coach', compact('firstFormData'));
    }

    public function saveAllData(ContactRequest $request)
    {
        // Retrieve data from the session
        $firstFormData = session()->get('firstFormData');

        // Create New Contact With All Data
        $contact = Contact::create([
            // Add fields from the first form [Session]
            'ClientName' => $firstFormData['ClientName'],
            'phone' => $firstFormData['phone'],
            'mail' => $firstFormData['mail'],
            // Add fields from the second form
            'CoachName' => $request['CoachName'],
            'chosen_datetime' => $request['chosen_datetime'],
        ]);

        // Clear the session data
        session()->forget('firstFormData');

        return redirect()->route('success');
    }

    public function Thankyou()
    {
        return view("success");
    }
}


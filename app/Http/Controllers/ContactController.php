<?php

//namespace App\Http\Controllers;
//
//use Illuminate\Http\Request;
//
//class ContactController extends Controller
//{
//    //
//}
// app/Http/Controllers/ContactController.php

namespace App\Http\Controllers;

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

    public function store(Request $request)
    {
        // Store data in the database
        $contact = new Contact();
        $contact->ClientName = $request->input('ClientName');
        $contact->phone = $request->input('phone');
        $contact->mail = $request->input('mail');

        $contact->CoashName = null;
        $contact->chosen_datetime = null;

        $contact->save();
        return redirect()->route('coach', ['id' => $contact->id]);
    }

    public function showCoachForm($id)
    {
        return view('coach', compact('id'));
    }

    public function saveAllData(Request $request, $id)
    {
        $contact = Contact::find($id);

        $contact->update([
            'CoashName'=> $request['CoashName'],
            'chosen_datetime'=>$request['chosen_datetime'],
        ]);

        return redirect()->route('success');
    }

    public function Thankyou()
    {
        return view("success");
    }
}


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

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        // Validate input
        $validator = $request->validate([
            'ClientName' => 'required|string',
            'phone' => 'required|string',
            'mail' => 'required|email',
        ]);

        // Store data in the database
        $contact = new Contact();
        $contact->ClientName = $request->input('ClientName');
        $contact->phone = $request->input('phone');
        $contact->mail = $request->input('mail');

        $validator = $contact->validate($request->all());
        if ($validator->fails()) {
            echo '<span style="color: red">Failed to store</span>';
        }
// Continue with saving the contact
//        $contact->save();
        $contact->save();

        return view('coach');
    }

    public function coach(Request $request)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $contact = unserialize(base64_decode($_POST['contact'])); // Retrieve serialized contact from hidden field

            $contact->CoashName = $_POST['CoashName'];
            $contact->chosen_datetime = $_POST['chosen_datetime'];

            // Simulate checking availability (replace with actual logic)
            $isAvailable = true;

            if ($isAvailable) {
                $contact->trigger = false;
                $this->saveContact($contact);

                // Send confirmation emails
                $this->sendConfirmationEmails($contact);

                echo 'Appointment booked successfully!';
            } else {
                echo 'Not available time, please choose another time.';
            }
        }
    }

    private function saveContact(Contact $contact)
    {
        // Simulate saving to a database (replace with actual database logic)
        // For simplicity, we're just printing the data here
        echo "Saving to database: ";
        print_r($contact);
    }

    private function sendConfirmationEmails(Contact $contact)
    {
        // Replace 'your_company_email@example.com' with the actual company email address
        $companyEmail = 'ahmed.sa.mns@gmail.com';

        // Send email to the user
        Mail::to($contact->mail)->send(new AppointmentConfirmation($contact, $contact->CoashName, $contact->chosen_datetime));

        // Send email to the company
        Mail::to($companyEmail)->send(new AppointmentConfirmation($contact, $contact->CoashName, $contact->chosen_datetime));

        echo '<span style="color: #4caf50;text-align: center">The Data Sent To Your Email You Can check it</span>';
    }
}


<?php

// app/Models/Contact.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'ClientName', 'phone', 'mail', 'trigger', 'CoachName', 'chosen_datetime', 'id'
    ];
    protected $rules = [
        'ClientName' => 'required|string',
        'phone' => 'required|string',
        'mail' => 'required|email',
        'CoachName' => 'required|string',
        'chosen_datetime' => 'required|dateTime',
        // Add other rules as needed
    ];

    public function validate($data)
    {
        return validator($data, $this->rules);
    }

    // Additional model logic can be added here, such as relationships, mutators, etc.
}

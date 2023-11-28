<?php

// app/Models/Contact.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';
    protected $fillable = [
        'ClientName', 'phone', 'mail', 'trigger', 'CoachName', 'chosen_datetime', 'id'
    ];

    protected $hidden = ['created_at', 'updated_at'];
}

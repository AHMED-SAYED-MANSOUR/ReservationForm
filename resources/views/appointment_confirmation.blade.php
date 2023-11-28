<!-- resources/views/emails/appointment_confirmation.blade.php -->

<p>Dear {{ $userData['ClientName'] }},</p>

<p>Your appointment with Coach {{ $coachName }} on {{ $chosenDateTime }} has been confirmed.</p>

<p>Thank you for choosing our service.</p>

<p>Best regards,<br>Your Company Name</p>

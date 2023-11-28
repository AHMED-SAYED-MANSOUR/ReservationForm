<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 400px;
            margin: 50px auto;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
        }
        input, select, button {
            margin-bottom: 10px;
            padding: 8px;
        }
        button {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>
<h1>Contact Form</h1>

@if(Session::has('success'))
    <div style="color: green;">{{ Session::get('success') }}</div>
@elseif(Session::has('error'))
    <div style="color: red;">{{ Session::get('error') }}</div>
@endif

<form method="post" action="{{ route('storeInSession') }}">
    @csrf
    <label for="ClientName">Your Name:</label>
    <input type="text" name="ClientName" id="ClientName">
    @error('ClientName')
        <small style="color: red;">{{ $message }}</small>
    @enderror
    <label for="phone">Your Phone Number:</label>
    <input type="text" name="phone" id="phone">
    @error('phone')
        <small style="color: red;">{{ $message }}</small>
    @enderror

    <label for="mail">Your Email:</label>
    <input type="text" name="mail" id="mail">
    @error('mail')
        <small style="color: red;">{{ $message }}</small>
    @enderror
    <input type="hidden" name="CoachName" id="CoachName" value="">
    <input type="hidden" name="chosen_datetime" id="CoachName" value="">

    <button type="submit">Next</button>
</form>
</body>
</html>

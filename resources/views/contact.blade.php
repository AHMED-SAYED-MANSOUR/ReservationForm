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

@if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@elseif(session('error'))
    <div style="color: red;">{{ session('error') }}</div>
@endif

<form method="post" action="{{ route('saveFirst') }}">
    @csrf
    <label for="ClientName">Your Name:</label>
    <input type="text" name="ClientName" required>
    @error('')
    @enderror

    <label for="phone">Your Phone Number:</label>
    <input type="text" name="phone" required>
    @error('')
    @enderror

    <label for="mail">Your Email:</label>
    <input type="email" name="mail" required>
    @error('')
    @enderror

    <button type="submit">Next</button>
</form>
</body>
</html>

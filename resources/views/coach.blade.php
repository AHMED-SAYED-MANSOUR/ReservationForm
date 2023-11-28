<!-- resources/views/coach.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coach Form</title>
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
<h1>Coach Form</h1>

@if(session('error'))
    <div style="color: red;">{{ session('error') }}</div>
@endif

<form method="post" action="{{ route('saveAllData', $id) }}">
    @csrf
    <label for="CoashName">Choose Coach:</label>
    <select name="CoashName" required>
        <option value="نورة مسفر">نورة مسفر</option>
        <option value="غسان الاحمدي">غسان الاحمدي</option>
        <option value="نايف اكرد">نايف اكرد</option>
    </select>

    <label for="chosen_datetime">Choose Date and Time:</label>
    <input type="datetime-local" name="chosen_datetime" required>

    <button type="submit">Submit</button>
</form>
</body>
</html>

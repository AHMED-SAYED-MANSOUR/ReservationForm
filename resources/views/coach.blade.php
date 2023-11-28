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

@if(Session::has('success'))
    <div style="color: green;">{{ Session::get('success') }}</div>
@elseif(Session::has('error'))
    <div style="color: red;">{{ Session::get('error') }}</div>
@endif

<form method="post" action="{{ route('saveAllData') }}">
    @csrf
    <label for="CoachName">Choose Coach:</label>
    <select name="CoachName" id="CoachName" required>
        <option value="نورة مسفر">نورة مسفر</option>
        <option value="غسان الاحمدي">غسان الاحمدي</option>
        <option value="نايف اكرد">نايف اكرد</option>
    </select>
    @error('CoachName')
        <small style="color: red;">{{ $message }}</small>
    @enderror

    <label for="chosen_datetime">Choose Date and Time:</label>
    <input
        id="hours"
        type="datetime-local"
        step="3600"
        onfocus="clearMinutes(this)"
        oninput="updateMinutes(this)"
        name="chosen_datetime"
        required>
    @error('chosen_datetime')
    <small style="color: red;">{{ $message }}</small>
    @enderror
    <input type="hidden" name="CoachName" id="CoachName" value="{{ $firstFormData['ClientName'] ?? '' }}">
    <input type="hidden" name="phone" id="CoachName" value="{{ $firstFormData['phone'] ?? '' }}">
    <input type="hidden" name="mail" id="CoachName" value="{{ $firstFormData['mail'] ?? '' }}">

    <button type="submit">Submit</button>
</form>

<script>
    function clearMinutes(input) {
        // Clear the minutes part when the input is focused
        input.value = input.value.replace(/:\d{2}$/, ':00');
    }
    function updateMinutes(input) {
        // Set minutes to "00" for the selected date and time
        input.value = input.value.replace(/:\d{2}$/, ':00');
    }
</script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>CSRF and Passport Demo</title>
    @vite('resources/js/app.js')
</head>
<body>
    <div id="app">
        <button id="demoButton">Send Request</button>
    </div>
</body>
</html>

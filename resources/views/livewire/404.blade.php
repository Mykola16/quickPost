<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Error</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>
<body>
<h1>Error</h1>
<p>Sorry, the chat cannot be deleted because the other user is still in the chat.</p>
<a href="{{ url('/message') }}">Go back to the chat list</a>
</body>
</html>

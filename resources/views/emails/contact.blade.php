<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contact Message</title>
</head>
<body>
    <h2>New Contact Message</h2>

    <p><strong>Name:</strong> {{ $user->name }}</p>

    <p><strong>Email:</strong> {{ $user->email }}</p>

    <p><strong>Subject:</strong> {{ $subjectText }}</p>

    <hr>

    <p>{{ $messageText }}</p>
</body>
</html>

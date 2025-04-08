<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contact Form Submission</title>
</head>
<body>
<h1>New Contact Form Submission</h1>
<p><strong>Name:</strong> {{ $data['name'] }}</p>
<p><strong>Email:</strong> {{ $data['email'] }}</p>
<p><strong>Subject:</strong> {{ $data['subject'] }}</p>
<p><strong>Message:</strong></p>
<p>{{ $data['message'] }}</p>
<hr>
<p>Received on: {{ now()->format('d M Y, H:i') }}</p>
</body>
</html>

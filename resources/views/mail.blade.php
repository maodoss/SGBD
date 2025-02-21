<!DOCTYPE html>
<html>
<head>
    <title>{{ $details['subject'] }}</title>
</head>
<body>
    <h1>Bonjour {{ $details['name'] }}</h1>
    <p>{{ $details['message'] }}</p>
    {{-- <p>Ceci est un test d'e-mail envoyé via Laravel et Gmail SMTP.</p> --}}
</body>
</html>

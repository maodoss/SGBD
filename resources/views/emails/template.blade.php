<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $details['subject'] }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
        }
        .header {
            text-align: center;
            padding: 20px 0;
            background-color: #223554;
            color: white;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 20px;
        }
        .code-box {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            padding: 15px;
            margin: 20px 0;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            letter-spacing: 2px;
        }
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 12px;
            color: #666;
            border-top: 1px solid #eee;
        }
        .logo {
            max-width: 150px;
            margin: 0 auto;
            display: block;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 20px 0;
            background-color: #223554;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>{{ $details['name'] }}</h1>
        </div>
        <div class="content">
            <p>
                @php
                    // Check if the message contains a code (typically an 8-character authentication code)
                    $message = $details['message'];
                    $pattern = '/[A-Z0-9]{8}/';
                    preg_match($pattern, $message, $matches);
                    
                    if (!empty($matches)) {
                        $code = $matches[0];
                        // Replace the code in original message with placeholder
                        $message = preg_replace($pattern, '###CODE###', $message);
                        // Split the message at the placeholder
                        $messageParts = explode('###CODE###', $message);
                    }
                @endphp
                
                @if(!empty($matches))
                    {!! nl2br(e($messageParts[0])) !!}
                    <div class="code-box">{{ $code }}</div>
                    {!! nl2br(e($messageParts[1])) !!}
                @else
                    {!! nl2br(e($message)) !!}
                @endif
            </p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Direction Générale Des Elections. Tous droits réservés.</p>
        </div>
    </div>
</body>
</html>
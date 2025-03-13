<!DOCTYPE html>
<html>
<head>
    <title>{{ $details['subject'] }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f8f9fa;
        }
        .header {
            text-align: center;
            padding: 20px;
            background-color: #0d6efd;
            color: white;
            border-radius: 5px;
            margin-bottom: 30px;
        }
        .content {
            background-color: white;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .message {
            white-space: pre-line;
            margin-bottom: 30px;
        }
        .footer {
            text-align: center;
            color: #6c757d;
            font-size: 0.9em;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #dee2e6;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>{{ $details['name'] }}</h1>
        </div>
        
        <div class="content">
            <div class="message">
                {{ $details['message'] }}
            </div>
            
            <div class="footer">
               
            </div>
        </div>
    </div>
</body>
</html>

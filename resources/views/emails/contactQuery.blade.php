<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Query</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>New Contact Query</h1>
        <p>A new contact query has been received:</p>
        <ul>
            <li><strong>Name:</strong> {{ $query->name }}</li>
            <li><strong>Email:</strong> {{ $query->email }}</li>
            <li><strong>Mobile No:</strong> {{ $query->mobile_no }}</li>
            <li><strong>Message:</strong> {{ $query->message }}</li>
        </ul>
    </div>
    <div class="footer">
        <p>This email was generated automatically. Please do not reply.</p>
    </div>
</body>
</html>

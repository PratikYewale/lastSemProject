<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Query Resolution</title>
</head>
<body>
    <p>Dear {{ $to_name }},</p>
    
    <p>We're writing to inform you that your query has been resolved. Below is the response to your query:</p>

    <p><strong>Original Query:</strong></p>
    <p>{{ $query }}</p>

    <p><strong>Our Response:</strong></p>
    <p>{{ $answer }}</p>

    <p>Thank you for reaching out to us.</p>

    <p>Sincerely,<br>
    INDIAN SKI AND SNOWBOARD</p>
</body>
</html>

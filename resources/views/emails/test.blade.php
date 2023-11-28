<!DOCTYPE html>
<html>
<head>
    <style>
        /* You can add some basic styling here */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>{{ $data['title'] }}</h2>
        <p>{{ $data['content'] }}</p>

        <p>Username: <strong>{{ $data['username'] }}</strong></p>
        <p>Your temporary password: <strong>{{ $data['password'] }}</strong></p>

        <p>Click the link below to login:</p>
        <p><a href="{{ $data['url'] }}" target="_blank">{{ $data['url'] }}</a></p>

        <p>If you did not initiate this login or have any concerns, please contact us immediately.</p>

        <p>Best Regards,<br>
        Your Website Team</p>
    </div>
</body>
</html>

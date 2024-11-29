<html>

<head>
    <title>User registration</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div style="text-align: center; margin-top: 50px;">
        <h1>Hello, {{ $username }} {{ $userlastname }}!</h1>
        <p>Your email: {{ $email }}</p>
    </div>
</body>

</html>
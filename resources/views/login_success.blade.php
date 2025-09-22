<!DOCTYPE html>
<html>
<head>
    <title>Login Details</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 30px;">
    <p>Dear {{ $user->name }},</p>
    <p>Welcome to our platform! Here are your login details:</p>
    <ul>
        <li><strong>Email:</strong> {{ $user->email }}</li>
        <li><strong>Password:</strong> {{ $user->codeid }}</li>
    </ul>
    <p>We recommend changing your password after logging in.</p>
    <a href="{{ url('/sign-in') }}" style="display:inline-block; padding:10px 20px; background:#2d89ef; color:#fff; text-decoration:none; border-radius:5px;">Login Now</a>
    
</body>
</html>

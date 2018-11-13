<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>

<div>
    <h3>Hi {{ $name }},</h3>
    <p>To reset your password use the link below.</p>
    <br>
    <a href="{{$resetUrl}}">Password Reset</a>
</div>

</body>
</html>
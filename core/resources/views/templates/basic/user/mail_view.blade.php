<!DOCTYPE html>
<html>
<head>
    <title>Site Name</title>
</head>
<body>
    <h1>{{ $mailData['title'] }}</h1>
    <p>Name:-{{ $mailData['name'] }}</p>
    <p>Email:-{{ $mailData['email'] }}</p>
    <p>Phone No:-{{ $mailData['phone_no'] }}</p>
    <p>{{ $mailData['subject'] }}</p>
</body>
</html>
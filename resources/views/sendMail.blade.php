<!-- send_email_form.html -->
@extends('master')
@section("content")
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Send Email Form</title>
</head>
<body>
    <div class="container">
    <h1>Send Email</h1>
    <form method="POST" action="/send-email">
        
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        
        <button onclick="sendMail()">submit</button>
    </form>
</div>
</body>

</html>
<script src="https://smtpjs.com/v3/smtp.js"></script>

<script>
    function sendMail(){
        Email.send({
    Host : "smtp.elasticemail.com",
    Username : "kmart8393@gmail.com",
    Password : "BB42119414FDF081FB5B6C7012AF3A55B0CB",
    To : 'koushal5742@gmail.com',
    From : "kmart8393@gmail.com",
    Subject : "This is the subject",
    Body : "And this is the body"
}).then(
  message => alert(message)
);
    }
    

</script>

@endsection
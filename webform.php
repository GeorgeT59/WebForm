<?php

//Always assuming the message is false, until the requirements are met.
$message_sent = false;
//If an email is actually entered.
if(isset($_POST['email'] && $_POST['email'] != '')
{
    //If the email is valid.
    if(filter_var($_POST['name'], FILTER_VALIDATE_EMAIL))
    {
        //Submit the actual form.
        $userName = $_POST['name'];
        $userEmail = $_POST['email'];
        $messageSubject = $_POST['subject'];
        $message = $_POST['message'];

        $to = "actualCompanyEmail@CB.com";
        $body = "";
        $body .= "From: ".$userName. "\r\n"; //Forces Line breaks.
        $body .= "Email: ".$userEmail. "\r\n";
        $body .= "Message: ".$message. "\r\n";

        mail($to,$messageSubject,$body);
        
        $message_sent = true;
    }
    else
    {
        $invalid_class_name = "form-invalid";
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--<link rel="stylesheet" href="webform.css" media="all">-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>    
    <script src="main.js"></script>
</head>

<body>
    <?php
    if($message_sent):
    ?>
        <!--The message that appears if actually sent.-->
        <h3>Thank you, your email has been sent.</h3>
    <?php
    else:
    ?>
    <!--This code will run first.-->
    <div class="container">
        <form action="webform.php" method="POST" class="form">
            <div class="form-group">
                <label for="name" class="form-label">Your Name</label>
                <input type="text" class="form-control" <?= $invalid_class_name ?? "" ?> id="name" name="FullName" placeholder="Jane Doe" tabindex="1" required>
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Your Email</label>
                <input type="email" class="form-control" id="email" name="Email" placeholder="Enter email here" tabindex="2" required>
            </div>
            <div class="form-group">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" class="form-control" id="subject" name="Subject" placeholder="Hello There!" tabindex="3" required>
            </div>
            <div class="form-group">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" rows="5" cols="50" id="message" name="message" placeholder="Enter Message..." tabindex="4"></textarea>
            </div>
            <div>
                <button type="submit" class="btn">Send Message!</button>
            </div>
        </form>
    </div>
    <?php
    endif;
    ?>
</body>
</html>
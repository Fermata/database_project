<?php
include "system/header.php";

if(@$_POST['action'] == "proc"){
    $username = mysqli_real_escape_string($database, $_POST['username']);
    $email = mysqli_real_escape_string($database, $_POST['email']);
    $password = password($_POST['password']);
    $bcardnum = mysqli_real_escape_string($database, $_POST['BcardNo']);
    echo $username;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Creata a MARTA Account</title>

    <link href="/tools/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/style/register.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="container">
        <form class="form-register" name="reg" role="form" action="/registration" method="post">
            <div class="logo-wrapper">
                <img class="logo" src="/images/marta_logo.png">
            </div>
            <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus autocapitalize="off"><span id="username_status"></span>
            <input type="text" id="email" name="email" class="form-control" placeholder="Email Address" required autofocus autocapitalize="off"><span id="email_status"></span>
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
            <input type="password" id="confirmpassword" name="confirmpassword" class="form-control" placeholder="Confirm Password" required><span id="password_match"></span>

            <input type="radio" name="breezecard" value="exist" class="enable_tb" required><span> Use my existing Breeze Card</span>
            <input type="text" id="BcardNo" name="BcardNo" class="form-control" placeholder="Card Number" required>
            <input type="radio" name="breezecard" value="new" class="disable_tb" required><span> Get a new Breeze Card</span>

            <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
            <input type="hidden" name="action" value="proc">

        </form>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/usernameck.js"></script>
        <script type="text/javascript" src="js/emailck.js"></script>
        <script type="text/javascript" src="js/pwmatch.js"></script>
        <script>
            $("#BcardNo").val('');
            $("#BcardNo").prop("disabled",true);
            $('input:radio').click(function() {
                if($(this).hasClass('enable_tb')) {
                    $("#BcardNo").prop("disabled",false);
                } else if ($(this).hasClass('disable_tb')) {
                    $("#BcardNo").val('');
                    $("#BcardNo").prop("disabled",true);
                }
            });
        </script>

    </div>
</body>

</html>

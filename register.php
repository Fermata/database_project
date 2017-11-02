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
        <form class="form-row" name="reg" role="form" action="/registration" method="post">
            <div class="logo-wrapper">
                <img class="logo" src="/images/marta_logo.png">
            </div>
            <div class="form-group row">
                <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="username" class="form-control" id="username" name="username" placeholder="Username" autofocus autocapitalize="off" required>
                </div>

            </div>
            <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" autocapitalize="off" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="confirmPassword" class="col-sm-2 col-form-label">Confirm Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="confirmPassword" name="confirmpassword" placeholder="Confirm Password" required>
                </div>
            </div>
            <fieldset class="form-group">
                <div class="row">
                    <label for="breezecard" class="col-sm-2 col-form-label">Breeze Card</label>
                    <div class="col-sm-8">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input enable_tb" type="radio" name="breezecard" id="breezecard1" value="option1" required>
                                Use my existing Breeze Card
                            </label>
                            <div class="col-sm-12">
                                <input type="username" class="form-control" id="inputCardno" name="bcardno" placeholder="Card Number" required></br>
                            </div>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input disable_tb" type="radio" name="breezecard" id="breezecard2" value="option2" required>
                                Get a new Breeze Card
                            </label>
                        </div>

                    </div>
                </div>
            </fieldset>
            <div class="form-group row">
                <div class="col-sm-10">
                </br>
                    <button type="submit" class="btn btn-primary btn-lg">Register</button>
                </div>
            </div>
        </form>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/usernameck.js"></script>
        <script type="text/javascript" src="js/emailck.js"></script>
        <script type="text/javascript" src="js/pwmatch.js"></script>
        
        <script>
            $("#inputCardno").val('');
            $("#inputCardno").prop("disabled",true);
            $('input:radio').click(function() {
                if($(this).hasClass('enable_tb')) {
                    $("#inputCardno").prop("disabled",false);
                } else if ($(this).hasClass('disable_tb')) {
                    $("#inputCardno").val('');
                    $("#inputCardno").prop("disabled",true);
                }
            });
        </script>
    </div>
</body>

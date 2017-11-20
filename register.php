<!DOCTYPE html>
<html lang="en">
<head>
    <script type="text/javascript" src="js/jquery.js"></script>
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
            <div class="form-group row">
                <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="username" class="form-control" id="username" name="username" placeholder="Username" autocapitalize="off" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" autocapitalize="off" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="confirmPassword" class="col-sm-2 col-form-label">Confirm Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password" required>
                </div>
            </div>
            <fieldset class="form-group row">
                <label for="breezecard" class="col-sm-2 col-form-label">Breeze Card</label>
                <div class="col-sm-9 well">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input enable_tb" type="radio" name="breezecard" id="breezecard1" value="option1" required>
                            Use my existing Breeze Card
                        </label>
                        <div class="col-sm-12">
                            <input type="bcardno" class="form-control" id="inputCardno" name="bcardno" placeholder="Card Number" required></br>
                        </div>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input disable_tb" type="radio" name="breezecard" id="breezecard2" value="option2" required>
                            Get a new Breeze Card
                        </label>
                    </div>
                </div>
            </fieldset>
            <div class="form-group row">
                <div class="col-sm-10">
                </br>
                <input type="submit" class="btn btn-primary btn-lg" value="Register"></button>
            </div>
        </div>
    </form>
    <script type="text/javascript">
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
        $('#inputCardno').blur(function() {
            var cardno = $(this).val();
            if (password === '') {
                return false;
            }
            if(!(/[0-9]{16}/).test(cardno)){
                alert('Breeze Card should be 16 numbers.');
                return false;
            }
        });
    </script>
</div>
</body>

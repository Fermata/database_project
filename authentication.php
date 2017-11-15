<?php
include "system/header.php";
$loginFailure = false;

if(authenticated){
    location("/home");
}

if(@$_POST['action'] == "proc"){
    $username = mysqli_real_escape_string($database, $_POST['username']);
    $password = password($_POST['password']);
    $result = mysqli_query($database, "SELECT * FROM user WHERE username = '{$username}' AND password = '{$password}'");
    if(mysqli_num_rows($result) == 1){
        $user = fetch($result, true);
        $_SESSION['authenticated'] = true;
        $_SESSION['username'] = $user['username'];
        location("/home");
    }else{
        $loginFailure = true;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MARTA Project</title>

    <link href="/tools/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="/style/authentication.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div class="container">
        <form class="form-signin" role="form" action="/authentication" method="post">
            <input type="text" name="username" class="form-control" placeholder="Username" required autofocus autocapitalize="off">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <input type="hidden" name="action" value="proc">
            <?php
            if($loginFailure){
                ?>
                <div class="alert alert-danger">Invalid username or password</div>
                <?php
            }
            if(@$_GET['lo']=='s'){
                ?>
                <div class="alert alert-success">Welcome</div>
                <?php
            }
            ?>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Log In</button>

        </form>
        <form class="form-register" role="form" action="/register" method="post">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
        </form>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
</body>
</html>

<?php
include "system/header.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcom to MARTA</title>

    <link href="/tools/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="/style/home.css" rel="stylesheet">

    <link rel="stylesheet" href="/tools/fontawesome/css/font-awesome.min.css">

    <script src="/tools/jquery/jquery.js"></script>
    <script src="/tools/bootstrap/js/bootstrap.min.js"></script>
    <?=@$customScriptsJS?>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.coms/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
        <div class="navbar-header">
        </div>
        <div class="navbar-collapse collapse">

            <ul class="nav navbar-nav navbar-right">
                <li><a href="/logout"><i class="glyphicon glyphicon-off"></i> Logout</a></li>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <?php if ($_SESSION['admin'] == '0') { ?>
                        <li><a href="/home"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="/managecards"><i class="fa fa-bullhorn"></i> Manage Cards</a></li>
                        <li><a href="/triphistory"><i class="fa fa-check-square-o"></i> View Trip History</a></li>
                    <?php } ?>                    
                    <?php if($_SESSION['admin'] == '1') { ?>
                        <li><a href="/admin-home"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="/admin-station"><i class="fa fa-th-list"></i> Station Management</a></li>
                        <li><a href="/admin-suspendedcard"><i class="fa fa-times"></i> Suspended Cards</a></li>
                        <li><a href="/admin-breezecard"><i class="fa fa-credit-card"></i> Breezecard Management</a></li>
                        <li><a href="/admin-flowreport"><i class="fa fa-table"></i> Passenger Flow Report</a></li>
                    <?php } ?>
                </ul>
                
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="margin-left:0px">

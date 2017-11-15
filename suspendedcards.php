<?php
include "system/header.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/images/favicon.ico">

    <title>Station Management</title>

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
<div class="container">
	<div class="row">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Card #</th>
					<th>New Owner</th>
					<th>Date Suspended</th>
					<th>Previous Owner</th>
				</tr>
			</thead>
			<tbody>
				<?
                $query = mysqli_query($database,"SELECT * FROM bree");
                while($data = mysqli_fetch_array($database,$query)){
					?>
					<tr>
						<td><?php=$data[0]?></td>
						<td><?php=$data['password']?></td>
						<td><?php=$data['isAdmin']?></td>
                        <td>abc</td>
					</tr>
				<? } ?>
			</tbody>
		</table>
	</div>
</div>
</body>

<?php
include "system/header.php";
?>
<!DOCTYPE html>
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
    <link href="/style/admin-home.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
	<div class="form-group row">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Station Name</th>
					<th>Stop ID</th>
					<th>Fare</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php
                $sql = "SELECT * FROM user";
                $result = mysqli_query($database,$sql);
                while($data = mysqli_fetch_array($result)){
					?>
					<tr>
						<td><?=$data[0]?></td>
						<td><?=$data[1]?></td>
						<td><?=$data[2]?></td>
                        <td>abc</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
</body>

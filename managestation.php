<?php
include "system/head.php";
?>

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
                $sql = "SELECT * FROM Station";
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

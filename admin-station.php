<?php
include "system/head.php";
?>
	<div class="container">
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
						<td><?=$data['Name']?></td>
						<td><?=$data['StopID']?></td>
						<td><?=$data['EnterFare']?></td>
						<td><?php if($data['ClosedStatus'] === '1') {
							echo "Closed";
						} else {
							echo "Open";
						}?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<div class="row">
				<button class="btn btn-primary" onclick="location.href = 'admin-newstation';" type="submit">Create New Station</button>
				<button class="btn btn-primary" onclick="location.href = 'admin-viewstation';" type="submit">View Station</button>
		</div>
	</div>
</body>

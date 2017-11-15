<?php
include "system/head.php";
?>

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

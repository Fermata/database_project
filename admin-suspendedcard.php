<?php
include "system/head.php";
?>

<div class="col-md-7">
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
				<?php
				$sql = "SELECT * FROM Conflict c , Breezecard b WHERE c.BreezecardNum = b.BreezecardNum";
				$result = mysqli_query($database,$sql);
                while($row = mysqli_fetch_array($result)){
					?>
					<tr>
						<td><?php echo $row['BreezecardNum']?></td>
						<td><?php echo $row['BelongsTo']?></td>
						<td><?php echo $row['DateTime']?></td>
                        <td><?php echo $row['Username']?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
</body>

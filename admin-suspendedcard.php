<?php
include "system/head.php";
?>

<div class="col-md-10">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Card #</th>
					<th>Previous Owner</th>
					<th>Date Suspended</th>
					<th>New Owner</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$sql = "SELECT c.BreezecardNum, b.BelongsTo, DateTime, c.Username FROM Conflict c , Breezecard b WHERE c.BreezecardNum = b.BreezecardNum";
				$result = mysqli_query($database,$sql);
                while($row = mysqli_fetch_array($result)){
					?>
					<tr>
						<td><?=$row['BreezecardNum']?></td>
						<td><button type="button" onclick="belongsTo('<?=$row['BelongsTo']?>','<?=$row['BreezecardNum']?>')" class="btn btn-link"><?php echo $row['BelongsTo']?></button></td>
						<td><?=$row['DateTime']?></td>
                        <td><button type="button" onclick="belongsTo('<?=$row['Username']?>','<?=$row['BreezecardNum']?>')" class="btn btn-link"><?php echo $row['Username']?></button></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<script>
function belongsTo(username,cardno) {
	var com = username.concat("&cardno=".concat(cardno));
    $.get( "/assign_card?username=" + com, function( data ) {
    });
    location.reload();
}
</script>
</body>

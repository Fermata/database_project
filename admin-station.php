<?php
include "system/head.php";

	$sql = "SELECT * From Station";
    $sort_by = isset($_GET['s']) ? $_GET['s'] : false;
    switch ($sort_by) {
        case 'Name':
		case 'StopID':
		case 'EnterFare':
		case 'ClosedStatus':
            break;
        default:
            $sort_by = 'Name';
    }

    $sql .= ' ORDER BY '.$sort_by.' ';

    $direction = isset($_GET['d']) ? $_GET['d'] : false;
    if ($direction != 'ASC' && $direction != 'DESC')
        $direction = 'DESC';
    $sql .= $direction;

    $res = mysqli_query($database, $sql);
    $results = array();

    if ($res) {
        while ($r = mysqli_fetch_assoc($res)) {
            $results[] = $r;
        }
    }
    
    $sort_arrow = ($direction == 'ASC' ? '<img src="images/up_arrow.png" />' : '<img src="images/down_arrow.png" />');

    $reverse_direction = ($direction == 'DESC' ? 'ASC' : 'DESC');
?>
<script>
fucntion view_station(stopid) {
	window.location.href = 'admin-viewstation?stopid=' + stopid;
}
</script>
	<div class="col-md-7">
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col" class="<?php echo $sort_by == 'Name' ? 'sortColumn' : ''; ?>">
						<a href="?s=Name&d=<?php echo $reverse_direction; ?>">Station Name</a>
						<?php echo $sort_by == 'Name' ? $sort_arrow : ''; ?>
					</th>
					<th scope="col" class="<?php echo $sort_by == 'Name' ? 'sortColumn' : ''; ?>">
						<a href="?s=StopID&d=<?php echo $reverse_direction; ?>">Stop ID</a>
						<?php echo $sort_by == 'StopID' ? $sort_arrow : ''; ?>
					</th>
					<th scope="col" class="<?php echo $sort_by == 'Name' ? 'sortColumn' : ''; ?>">
						<a href="?s=EnterFare&d=<?php echo $reverse_direction; ?>">Entry Fare</a>
						<?php echo $sort_by == 'EnterFare' ? $sort_arrow : ''; ?>
					</th>
					<th scope="col" class="<?php echo $sort_by == 'Name' ? 'sortColumn' : ''; ?>">
						<a href="?s=ClosedStatus&d=<?php echo $reverse_direction; ?>">Status</a>
						<?php echo $sort_by == 'ClosedStatus' ? $sort_arrow : ''; ?>
					</th>					
					<th>View</th>
				</tr>
			</thead>
			<tbody>
				<?php
					if (count($results) > 0) {
						foreach ($results as $data) {
							print '<tr>';
							print '<td>'.$data['Name'].'</td>';
							print '<td>'.$data['StopID'].'</td>';
							print '<td>'.$data['EnterFare'].'</td>';
							if($data['ClosedStatus'] === '1') {
								$status = "Closed";
							} else {
								$status = "Open";
							}
							print '<td>'.$status.'</td>';
							print '<td><button type="button" class="btn btn-link" onclick="javascript:location.href = '.'\''.'admin-viewstation?stopid='.$data['StopID'].'\'">View</button></td>';
							print '</tr>';
						}
					} else {
						print '<tr><td colspan=3>No results found</td></tr>';
					}
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
					<td><button type="button" class="btn btn-link" onclick="javascript:location.href = 'admin-viewstation?stopid='+'<?=$data['StopID']?>'">View</button></td>
				</tr>
			</tbody>
		</table>
		<div class="row">
				<button class="btn btn-primary" onclick="location.href = 'admin-newstation';" type="submit">Create New Station</button>
		</div>
	</div>
</div>
</body>

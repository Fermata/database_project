<?php
include "system/head.php";
$sql="SELECT * FROM Trip INNER JOIN Breezecard ON Trip.BreezecardNum = Breezecard.BreezecardNum WHERE BelongsTo = '{$_SESSION['username']}' AND StartTime";
$sql .=" BETWEEN '2016-11-10 00:00:00' AND '2017-11-30 00:00:00'";
$result = $database->query($sql);
$_GET['']
?>
                <div class="col-md-10">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Start Time:</label>
                        <div class="col-md-5">
                            <input class="form-control" type="text">
                        </div>
                        <button type="button" class="btn btn-primary" onclick="update_fare(<?=$Station['StopID']?>)">Update</button>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">End Time:</label>
                        <div class="col-md-5">
                            <input class="form-control" type="text">
                        </div>
                        <button type="button" class="btn btn-primary" onclick="update_fare(<?=$Station['StopID']?>)">Reset</button>
                    </div>
                    <div class="form-group row">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Time</th>
                                    <th>Source</th>
                                    <th>Destination</th>
                                    <th>Fare Paid</th>
                                    <th>Card #</th>
                                </tr>
                            </thead>
                            <tbody>                                
                                <?php while($row = mysqli_fetch_assoc($result)){ ?>
                                <tr>
                                    <td><?=$row['StartTime']?></td>
                                    <td><?=$row['StartsAt']?></td>
                                    <td><?=$row['EndsAt']?></td>
                                    <td><?=$row['Tripfare']?></td>
                                    <td><?=$row['BreezecardNum']?></td>
                                </tr>                                    
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
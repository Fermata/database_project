<?php
include "system/head.php";
$StopID = $_GET['stopid'];

$sql = "SELECT S.StopID,Name,EnterFare,ClosedStatus,IsTrain,Intersection FROM Station AS S LEFT JOIN  BusStationIntersection AS B ON S.StopID = B.StopID WHERE S.StopID = '{$StopID}'";
$result = mysqli_query($database,$sql);
$Station = fetch($result,true);
if($Station['IsTrain'] ==='1'){
    $Station['Intersection']="Not Available for Train Stations.";
}
?>

<script>
function update_fare(stopid) {
    var updated_fare = document.getElementById('Fare').value;
    $.get( "/update_fare?stopid=" + stopid +"&fare=" + updated_fare, function( data ) {
        document.getElementById('Fare').value = data.Fare;
    });
    location.reload();
}

$(document).ready(function() {
    $('#status').on('change', function(){
        if(this.checked){
            $.get( "/station_status?stopid=" + <?=$Station['StopID']?> +"&checked=0", function( data ) {
            });
        }else{
            $.get( "/station_status?stopid=" + <?=$Station['StopID']?> +"&checked=1", function( data ) {
            });
        }
        location.reload();
    })
});
</script>
<div class="col-md-7">
            <h1 class="card-title" style="font-weight: bold;"><?=$Station['Name']?></h1>
            <h4 class="card-subtitle text-muted"><?php echo "Stop ".$Station['StopID']?></h4>
            <div class="form-group row">
                <label for="Fare" class="col-sm-2 col-form-label">Fare: </label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="Fare" value="<?=$Station['EnterFare']?>">
                </div>
                <button type="button" class="btn btn-link" onclick="update_fare(<?=$Station['StopID']?>)">Update Fare</button>
            </div>
            <div class="form-group row">
                <label for="NearestIntersction" class="col-sm-3 col-form-label">Nearest Intersction: </label>
                <div class="col-sm-9">
                    <p class="form-control-static" id="NearestIntersction"><?=$Station['Intersection']?></p>
                </div>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" id='status' type="checkbox" value=""
                    <?php
                    if ($Station['ClosedStatus'] === '0') {
                        echo "checked";
                    }else{
                        echo "";
                    }
                    ?>>
                    Open Station<br>When checked, passengers can enter at this station.
                </label>
            </div>
    </div>
</div>

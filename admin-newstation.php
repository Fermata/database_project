<?php
include "system/head.php";
?>
<script>
    function create_station() {
        var name = document.getElementById("StationName").value;
        var id = document.getElementById("StopID").value;
        var fare = document.getElementById("EntryFare").value;
        if($("input[type=radio]:checked").val() == "bus"){
            var istrain = 0;
        }else{
            var istrain = 1;
        }
        var intersection = document.getElementById("intersection").value;
        var status = document.getElementById("status").checked;
        if(status == true){
            status = 0;
        }else{
            status = 1;
        }
        var com = "name="+name+"&id="+id+"&fare="+fare+"&istrain="+istrain+"&intersection="+intersection+"&status="+status;
        $.get( "/create_station?" + com, function( data ) {
        });
    }
</script>

        <div class="col-md-12">
            <h2 class="card-title" style="font-weight: bold;">Create New Station</h2></br>
            <div class="form-group row">
                <label for="StationName" class="col-sm-2 col-form-label">Station Name: </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="StationName" value="" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="StopID" class="col-sm-2 col-form-label">Stop ID: </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="StopID" value="" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="EntryFare" class="col-sm-2 col-form-label">Entry Fare: </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="EntryFare" value="" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="StationType" class="col-sm-2 col-form-label">Station Type </label>
                <div class="row">
                    <div class="radio">                    
                        <div class="col-sm-2">
                            <label><input type="radio" name="StationType" value="bus" id="bus" required>Bus Station</label>
                            <input class="form-control col-sm-2" type="text" id="intersection" placeholder="Nearest Intersection">
                        </div>
                        <div class="col-sm-2">
                            <label><input type="radio" name="StationType" value="train" id="train" required>Train Station</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="form-check-label">
                    <input class="form-check-input" id='status' type="checkbox" value="">
                    Open Station<br>When checked, passengers can enter at this station.
                </label>
            </div>
            <div class="form-group row">
                <button type="button" class="btn btn-primary" onclick="create_station()">Create Station</button>
            </div>
        </div>
    </div>
</div>

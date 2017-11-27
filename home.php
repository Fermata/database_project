<?php
include "system/head.php";

?>
<script>
function cardBalance() {
    $("#balanceField").html("Loading...");
    $.get( "/card_balance?card=" + $("#cardNo").val(), function( data ) {
        $("#balanceField").html("$" + data.Value);
    });
}

window.onload = function cardBalance() {
    $('#startstation').prop('disabled', true);
    $('#endstation').prop('disabled', true);
    $('#tripstart').prop('disabled', true);
    $('#tripend').prop('disabled', true);
    
    $.get( "/check_progress?cardno=" + $("#cardNo").val(), function( data ) {
        if(!data){
            $('#startstation').prop('disabled', false);
            $('#tripstart').prop('disabled', false);
            $('#endstation').prop('disabled', true);
            $('#tripend').prop('disabled', true);
            $('#tripend').css('color','red');
            $('#tripend').html('Start your trip first');
            $('#endstation').attr('selected', 'selected');
            return;
        }
        if(data.EndsAt == null){
            $('#cardNo').prop('disabled', true);            
            $('#startstation').prop('disabled', true);
            $('#tripstart').prop('disabled', true);
            $('#tripstart').css('color','red');
            $('#startstation option[value='+data.StopID+']').attr('selected', 'selected');
            $('#endstation').prop('disabled', false);
            $('#tripend').prop('disabled', false);
            $('#tripend').css('color','blue');
            $('#tripend').html('End Trip');
        }else{
            $('#startstation').prop('disabled', false);
            $('#tripstart').prop('disabled', false);
            $('#tripstart').css('color','blue');
            $('#tripstart').html('Start Trip');
        }
    });
    $("#balanceField").html("Loading...");
    $.get( "/card_balance?card=" + $("#cardNo").val(), function( data ) {
        $("#balanceField").html("$" + data.Value);
    });
    if(!$('#tripstart').is(':disabled')){
        $('#endstation').prop('disabled', true);
        $('#tripend').prop('disabled', true);
        $('#tripend').css('color','red');
        $('#tripend').html('Start your trip first');
        $('#endstation').attr('selected', 'selected');
    }
    
}

$(document).ready(function() {
    $('#tripstart').on('click',function(){
        var stopid = $("#startstation option:selected").val();
        var cardno = $("#cardNo").val();
        $.get( "/start_trip?stopid=" + stopid+"&cardno"+cardno, function( data ) {
        });
        $('#cardNo').prop('disabled', true);        
        $('#startstation').prop('disabled', true);
        (this).disabled = true;
        (this).style.color = "red";
        (this).innerHTML = 'Trip in Progress';
        $('#endstation').prop('disabled', false);
        $('#tripend').prop('disabled', false);
        $('#tripend').css('color','blue');
        $('#tripend').html('End Trip');
    })
    $('#tripend').on('click',function(){
        $('#cardNo').prop('disabled', false);
        $('#startstation').prop('disabled', false);
        $('#tripstart').prop('disabled', false);
        $('#tripstart').css('color','blue');
        $('#tripstart').html('Start Trip');
        $('#endstation').prop('disabled', true);
        $('#tripend').prop('disabled', true);
        $('#tripend').css('color','red');
        $('#tripend').html('Start your trip first');
        $('#endstation').attr('selected', 'selected');
    })
    $('#cardNo').on('change',function(){
        $.get( "/check_progress?cardno=" + $("#cardNo").val(), function( data ) {
            if(!data) {
                $('#startstation').prop('disabled', false);
                $('#tripstart').prop('disabled', false);
                $('#tripstart').css('color','blue');
                $('#tripstart').html('Start Trip');
                $('#endstation').prop('disabled', true);
                $('#tripend').prop('disabled', true);
                $('#tripend').css('color','red');
                $('#tripend').html('Start your trip first');
                $('#endstation').attr('selected', 'selected');
                return;
            }
            if(data.EndsAt == null){
                $('#cardNo').prop('disabled', true);
                $('#startstation').prop('disabled', true);
                $('#tripstart').prop('disabled', true);
                $('#tripstart').css('color','red');
                $('#tripstart').html('Trip in Progress');
                $('#endstation').prop('disabled', false);
                $('#tripend').prop('disabled', false);
                $('#tripend').css('color','blue');
                $('#tripend').html('End Trip');
                $('#endstation').attr('selected', 'selected');
            }
        });
    })
});
</script>
                <div class="col-md-10">
                    <div class="form-group row">
                        <label for="breezecard" class="col-sm-3 col-form-label">Breeze Card</label>
                        <div class="col-sm-6">
                            <select id="cardNo" class="form-control" onchange="cardBalance()">
                                <?php
                                $sql = "SELECT * From Breezecard WHERE BelongsTo='{$_SESSION['username']}'";
                                $result = mysqli_query($database,$sql);
                                while($row = mysqli_fetch_array($result)){
                                    $value = $row['Value'];
                                    ?>
                                    <option><?=$row['BreezecardNum']?></option>
                                <?php }?>
                            </select>
                        </div>
                        <button type="button" onclick="location.href = 'managecards';" class="col-sm-3 btn btn-link">Manage Cards</button>
                    </div>        
                    <div class="form-group row">
                        <label for="balance" class="col-sm-3 col-form-label">Balance</label>
                        <div class="col-sm-9">
                            <p class="form-control-static" id="balanceField"></p>
                        </div>
                    </div>        
                    <div class="form-group row">
                        <label for="breezecard" class="col-sm-3 col-form-label">Start at</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="startstation" id="startstation">
                                <?php
                                $sql = "SELECT * From Station";
                                $result = mysqli_query($database,$sql);
                                while($row = mysqli_fetch_array($result)){
                                    ?>
                                    <option value="<?=$row['StopID']?>"><?=$row['Name']?></option>
                                <?php }?>
                            </select>
                        </div>
                        <button type="button" id="tripstart" class="col-sm-3 btn btn-link" value="Start Trip">Start Trip</button>
                    </div>        
                    <div class="form-group row">
                        <label for="breezecard" class="col-sm-3 col-form-label">Ending at</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="endstation">
                                <?php
                                $sql = "SELECT * From Station";
                                $result = mysqli_query($database,$sql);
                                while($row = mysqli_fetch_array($result)){
                                    ?>
                                    <option><?=$row['Name']?></option>
                                <?php }?>
                            </select>
                        </div>
                        <button type="button" id="tripend" class="col-sm-3 btn btn-link">End Trip</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

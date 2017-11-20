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
</script>
        <div class="col-md-7">
            <div class="row">
        
            <label for="breezecard" class="col-sm-3 col-form-label">Breeze Card</label>
                <div class="col-sm-6">
                    <select id="cardNo" class="form-control" onchange="cardBalance()">
                        <option id="card" selected="selected" value="">-- Select an option --</option>
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
            <div class="row">
                <label for="balance" class="col-sm-3 col-form-label">Balance</label>
                <div class="col-sm-9">
                    <p class="form-control-static" id="balanceField"></p>
                </div>
            </div>        
            <div class="row">
                <label for="breezecard" class="col-sm-3 col-form-label">Start at</label>
                <div class="col-sm-6">
                    <select class="form-control">
                        <option selected="selected" value="">-- Select an option --</option>
                        <?php
                        $sql = "SELECT * From Station";
                        $result = mysqli_query($database,$sql);
                        while($row = mysqli_fetch_array($result)){
                            ?>
                            <option><?=$row['Name']?></option>
                        <?php }?>
                    </select>
                </div>
                <button type="button" class="col-sm-3 btn btn-link">Link</button>
            </div>        
            <div class="row">
                <label for="breezecard" class="col-sm-3 col-form-label">Ending at</label>
                <div class="col-sm-6">
                    <select class="form-control">
                        <option selected="selected" value="">-- Select an option --</option>
                        <?php
                        $sql = "SELECT * From Station";
                        $result = mysqli_query($database,$sql);
                        while($row = mysqli_fetch_array($result)){
                            ?>
                            <option><?=$row['Name']?></option>
                        <?php }?>
                    </select>
                </div>
                <button type="button" class="col-sm-3 btn btn-link">Link</button>
            </div>
            </div>
        </div>
    </div>
</body>

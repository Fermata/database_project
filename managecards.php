<?php
include "system/head.php";
?>
<script>
function removeCard(cardNo) {
    if(cardNo.toString().length < 16) {
        cardNo = "0".concat(cardNo.toString());
    }
    $.get( "/remove_card?card=" + cardNo, function( data ) {
    });
    location.reload();
}
$("#table tr").click(function(){
   $(this).addClass('selected').siblings().removeClass('selected');    
   var value=$(this).find('td:first').html();
   alert(value);    
});

$('.ok').on('click', function(e){
    alert($("#table tr.selected td:first").html());
});
</script>
    <div class="col-md-7">
        <label>Breeze Card</label>
        <table id="table" class="table table-striped">
            <thead>
                <tr>
                    <th>Select</th>
                    <th>Card Number</th>
                    <th>Value</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * From Breezecard WHERE BelongsTo='{$_SESSION['username']}'";
                $result = mysqli_query($database,$sql);
                while($data = mysqli_fetch_array($result)){
                    ?>
                    <tr>
                        <td class="col-md-1"><input type="radio" name="breezecard" id="breezecard" value="option1"></td>
                        <td class="col-md-6"><?=$data['BreezecardNum']?></td>
                        <td class="col-md-3"><?=$data['Value']?></td>
                        <td class="col-md-3"><button type="button" onclick="removeCard(<?=$data['BreezecardNum']?>)" class="btn btn-link">Remove</button></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <form>
            <div class="form-inline">
                <input type="text" class="form-control">
                <button type="submit" class="btn btn-primary">Add Card</button>
            </div>
        </form>
        <label for="breezecard" class="col-form-label">Add Value to Selected Card</label>
        <div class="col-sm-12 well">
            <div class="form-group row">
                <label for="creditcard" class="col-sm-3 col-form-label">Breezecard #</label>
                <div class="col-sm-7">
                    <input type="cardno" class="form-control" id="creditcard" placeholder="Breezecard #">
                </div>
            </div>
            <div class="form-group row">
                <label for="creditcard" class="col-sm-3 col-form-label">Credit Card #</label>
                <div class="col-sm-7">
                    <input type="cardno" class="form-control" id="creditcard" placeholder="Credit Card #">
                </div>
            </div>
            <div class="form-group row">
                <label for="value" class="col-sm-3 col-form-label">Value</label>
                <div class="col-sm-4">
                    <input type="value" class="form-control" id="value" placeholder="Value">
                </div>
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-primary">Add Value</button>
                </div>
            </div>
        </div>
    </div>
</div>

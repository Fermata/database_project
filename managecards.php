<?php
include "system/head.php";

    $sql = "SELECT * From Breezecard WHERE BelongsTo='{$_SESSION['username']}'";
    $sort_by = isset($_GET['s']) ? $_GET['s'] : false;
    switch ($sort_by) {
        case 'BreezecardNum':
        case 'value':
            break;
        default:
            $sort_by = 'BreezecardNum';
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
function removeCard(cardNo) {
    if(cardNo.toString().length < 16) {
        cardNo = "0".concat(cardNo.toString());
    }
    $.get( "/remove_card?card=" + cardNo, function( data ) {
    });
    location.reload();
}

function add_value() {
    if($('#creditcard').val()==""){
        alert("Input Credit Card Number");
        return;
    }
    if($('#value').val()==""){
        alert("Input Value");
        return;
    }
    if($("input[type=radio]:checked").size() == 1) {
        var cardno = $("input[type=radio]:checked").val();
        var value = $('#value').val();
        $.get( "/add_value?cardno=" + cardno + "&value="+value, function( data ) {
        });
        location.reload();
    }else{
        alert("Select Card");
        return;
    }
    location.reload();
}

function add_card() {
    var cardno = $('#newcardnum').val();
    if(cardno == ""){
        alert("Input Card Number");
        return;
    }
    if(!(/[0-9]{16}/).test(cardno)){
                alert('Breeze Card should be 16 numbers.');
                return;
            }
    $.get( "/add_card?cardno=" + cardno, function( data ) {
    });
    location.reload();
}
</script>
    <div class="col-md-7">
        <div class="form-group row">
            <label>Breeze Card</label>
            <table id="table" class="table table-striped">
                <thead>
                    <tr>
                        <th>Select</th>
                        <th scope="col" class="<?php echo $sort_by == 'BreezecardNum' ? 'sortColumn' : ''; ?>">
                            <a href="?s=BreezecardNum&d=<?php echo $reverse_direction; ?>">Card Number</a>
                            <?php echo $sort_by == 'BreezecardNum' ? $sort_arrow : ''; ?>
                        </th>
                        <th scope="col" class="<?php echo $sort_by == 'BreezecardNum' ? 'sortColumn' : ''; ?>">
                            <a href="?s=value&d=<?php echo $reverse_direction; ?>">Value</a>
                            <?php echo $sort_by == 'value' ? $sort_arrow : ''; ?>
                        </th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if (count($results) > 0) {
                            foreach ($results as $r) {
                                print '<tr>';
                                print '<td class="col-md-1"><input type="radio" name="breezecard" id="breezecard" value='.$r['BreezecardNum'].'></td>';
                                print '<td class="col-md-6">'.$r['BreezecardNum'].'</td>';
                                print '<td class="col-md-3">$'.$r['Value'].'</td>';
                                print '<td class="col-md-3"><button type="button" onclick="removeCard('.$r['BreezecardNum'].')" class="btn btn-link">Remove</button></td>';
                                print '</tr>';
                            }
                        } else {
                            print '<tr><td colspan=3>No results found</td></tr>';
                        }
                    ?>  
                       
                </tbody>
            </table>
        </div>
        
        <div class="form-group row">
            <div class="form-inline">
                <input type="text" id="newcardnum" class="form-control">
                <button type="submit" onclick="add_card()" class="btn btn-primary">Add Card</button>
            </div>
        </div>

        <div class="form-group row">
            <label for="breezecard" class="col-form-label">Add Value to Selected Card</label>
            <div class="col-sm-12 well">
                
                <div class="form-group row">
                    <label for="creditcard" class="col-sm-3 col-form-label">Credit Card #</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="creditcard" placeholder="Credit Card #">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="value" class="col-sm-3 col-form-label" required>Value</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="value" placeholder="Value" required>
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" onclick="add_value()" class="btn btn-primary">Add Value</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

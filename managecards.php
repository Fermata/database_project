<?php
include "system/head.php";
?>
    <div class="container">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Breeze Card</label>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Card Number</th>
                        <th>Value</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
    				<?php
                    $sql = "SELECT * FROM Breezecard";
                    $result = mysqli_query($database,$sql);
                    while($data = mysqli_fetch_array($result)){
    					?>
    					<tr>
    						<td><?=$data['BreezecardNum']?></td>
    						<td><?=$data['Value']?></td>
    						<td><button type="button" onclick="location.href = 'managecards';" class="btn btn-link">Remove</button></td>
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
        </div>
        <fieldset class="form-group row">
            <label for="breezecard" class="col-form-label">Add Value to Selected Card</label>
            <div class="col-sm-12 well">
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
        </fieldset>
    </div>
</div>

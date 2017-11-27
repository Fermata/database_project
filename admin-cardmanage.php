<?php
include "system/head.php";

"SELECT BreezecardNum, Value, Belongsto FROM Breezecard WHERE ownerinput = Belongsto OR cardnumberinput = BreezecardNum AND Value BETWEEN valueinput1 AND valueinput2";
$sql="SELECT BreezecardNum, Value, BelongsTo FROM Breezecard WHERE Belongsto = 'ownerinput' OR BreezecardNum = '4769432303280540' AND Value BETWEEN '10' AND '1000'";
$result = $database->query($sql);
echo mysqli_num_rows($result);
?>
                <div class="col-md-10">
                    <div class="form-group row">
                        <h3>Breeze Cards</h3>
                        <h4>Search/Filter</h4>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Owner:</label>
                        <div class="col-md-5">
                            <input class="form-control" type="text">
                        </div>
                        <div>
                            <label class="form-check-label">
                                <input class="form-check-input" id='status' type="checkbox" value="">Show Suspended Cards
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Card Number:</label>
                        <div class="col-md-5">
                            <input class="form-control" type="text">
                        </div>
                        <div>
                            <button class="btn btn-primary">Reset</button>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Value between:</label>
                        <div class="col-md-2">
                            <input class="form-control" type="text" name="startvalue">
                        </div>
                        <div class="col-md-1">
                            <p> and </p>
                        </div>                        
                        <div class="col-md-2">
                            <input class="form-control" type="text" name="endvalue">
                        </div>
                        <div>
                            <button class="btn btn-primary">Update Filter</button>
                        </div>
                    </div>
                    <div class="form-group row">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Select</th>
                                    <th>Card #</th>
                                    <th>Value</th>
                                    <th>Owner</th>
                                </tr>
                            </thead>
                            <tbody>                                
                                <?php while($row = mysqli_fetch_assoc($result)){ ?>
                                <tr>
                                    <td><input type="radio" name="ab"></td>
                                    <td><?=$row['BreezecardNum']?></td>
                                    <td><?=$row['Value']?></td>
                                    <td><?=$row['BelongsTo']?></td>
                                </tr>                                    
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <input class="form-control" type="text">
                        </div>
                        <button class="btn btn-primary col-md-3">Set Value of Selected Card</button>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <input class="form-control" type="text">
                        </div>
                            <button class="btn btn-primary col-md-3">Transfer Selected Card</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
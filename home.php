<?php
include "system/head.php";
?>
    <div class="container">
        <div class="form-group">
            <div class="row">
                <label for="breezecard" class="col-sm-3 col-form-label">Breeze Card</label>
                <div class="col-sm-6">
                    <select class="form-control">
                        <option selected="selected" value="">-- Select an option --</option>
                        <?php
                        $sql = "SELECT * From Breezecard";
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
        </div>
        <div class="form-group">
            <div class="row">
                <label for="balance" class="col-sm-3 col-form-label">Balance</label>
                <div class="col-sm-9">
                    <p class="form-control-static"><?php echo "$ " . $value; ?></p>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label for="breezecard" class="col-sm-3 col-form-label">Start at</label>
                <div class="col-sm-6">
                    <select class="form-control">
                        <option selected="selected" value="">-- Select an option --</option>
                        <?php
                        $sql = "SELECT * From Breezecard";
                        $result = mysqli_query($database,$sql);
                        while($row = mysqli_fetch_array($result)){
                            ?>
                            <option><?=$row['Value']?></option>
                        <?php }?>
                    </select>
                </div>
                <button type="button" class="col-sm-3 btn btn-link">Link</button>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label for="breezecard" class="col-sm-3 col-form-label">Ending at</label>
                <div class="col-sm-6">
                    <select class="form-control">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select>
                </div>
                <button type="button" class="col-sm-3 btn btn-link">Link</button>
            </div>
            </div>
        <div class="form-group">
            <div class="row">
                    <button class="btn btn-primary" onclick="location.href = 'triphistory';" type="submit">View Trip History</button>
            </div>
        </div>
    </div>
</body>

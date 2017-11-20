<?php
  include "system/head.php";
?>
    <div class="row">
    <center>
        <form class="form-group" name="reg" role="form" method="post">
            <div class="row">
                <button type="button" onclick="location.href = 'admin-station';" class="btn btn-primary btn-lg">Station Management</button>
            </div>
            <div class="row">
                <button type="button" onclick="location.href = 'admin-suspendedcard';" class="btn btn-primary btn-lg">Suspended Cards</button>
            </div>
            <div class="row">
                <button type="button" onclick="location.href = 'admin-breezecard';" class="btn btn-primary btn-lg">Breeze Card Management</button>
            </div>
            <div class="row">
                <button type="button" onclick="location.href = 'admin-flowreport';" class="btn btn-primary btn-lg">Passenger Flow Report</button>
            </div>
            <div class="row">
                <button type="button" onclick="location.href = 'logout';" class="btn btn-primary btn-lg">Log Out</button>
            </div>
        </div>
    </form>
</div>
</html>

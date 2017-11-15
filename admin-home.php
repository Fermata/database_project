<?php
  include "system/head.php";
?>
    <div class="container">
        <center>
        <form class="form-group" name="reg" role="form" method="post">
            <div class="row">
                <button type="button" onclick="location.href = 'managestation';" class="btn btn-primary btn-lg">Station Management</button>
            </div>
            <div class="row">
                <button type="button" onclick="location.href = 'suspendedcards';" class="btn btn-primary btn-lg">Suspended Cards</button>
            </div>
            <div class="row">
                <button type="button" onclick="location.href = 'cardmanagement';" class="btn btn-primary btn-lg">Breeze Card Management</button>
            </div>
            <div class="row">
                <button type="button" onclick="location.href = 'flowreport';" class="btn btn-primary btn-lg">Passenger Flow Report</button>
            </div>
            <div class="row">
                <button type="button" onclick="location.href = 'logout';" class="btn btn-primary btn-lg">Log Out</button>
            </div>
        </div>
    </form>
</div>
</html>

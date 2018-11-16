<?php
session_start();
require_once "database.php";
include "header.php";


if (!isset($_SESSION['student_session'])) {
    header("Location: index.php");
}
  


$query = "SELECT * FROM attendance WHERE student_id=:student_id";
$statement = $db->prepare($query);
$statement->bindValue(':student_id', $_SESSION['student_session']);
$statement->execute();
$row = $statement->fetch();

if($row['status'] == 1){
          header("Location: student_1.php");
}


        
?>
<div class="container">
      <div id="attendance_recorded" style="display: none">
            <div class="container space_left">
    <div class="row">
        <div class="modalbox success col-sm-8 col-md-6 col-lg-5 center animate">
            <div class="icon">
                <span class="glyphicon glyphicon-ok"></span>
            </div>
            <h1>Success!</h1>
            <p>Your Attendance Has been Signed!!!</p>
            <button type="button" class="redo btn">Ok</button>
        </div>
    </div>
</div>
            
                    </div>
    <form class="record-form" id="record-form" autocomplete="off" method="post" action="code.php" >
        
        
                    <div id="error">
                        <!-- error will be shown here ! -->
                    </div>
                                    <!-- 5PN6EA ! -->
        
        <h1>RECORD ATTENDANCE</h1>
        <div class="form__group form__pincode">
            <label>Enter 6-char code from the Screen</label>
            <input type="text" name="pincode-1" maxlength="1" tabindex="1" placeholder="·" autocomplete="new-password">
            <input type="text" name="pincode-2" maxlength="1" tabindex="2" placeholder="·" autocomplete="new-password">
            <input type="text" name="pincode-3" maxlength="1" tabindex="3" placeholder="·" autocomplete="off">
            <input type="text" name="pincode-4" maxlength="1" tabindex="4" placeholder="·" autocomplete="off">
            <input type="text" name="pincode-5" maxlength="1" tabindex="5" placeholder="·" autocomplete="off">
            <input type="text" name="pincode-6" maxlength="1" tabindex="6" placeholder="·" autocomplete="off">
        </div>
        <div class="form__buttons">
           <input type="submit" value="Record" class="button button--primary" name="btn-record" id="btn-record">
        </div>
    </form>
</div>
<br>

</body>
<script src="folder/js.js" type="text/javascript"></script>
</html>

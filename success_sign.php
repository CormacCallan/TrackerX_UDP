
<?php
require_once "database.php";
include "header.php";
?>

<div class="container space_left">
    <div class="row">
        <div class="modalbox success col-sm-8 col-md-6 col-lg-5 center animate">
            <div class="icon">
                <span class="glyphicon glyphicon-ok"></span>
            </div>
            <h1>Success!</h1>
            <p>Your Attendance Had Signed!!!</p>
            <button type="button" class="redo btn">Ok</button>
            <span class="change">-- Click to see opposite state --</span>
        </div>
    </div>
    <!--                <div class="row">
                        <div class="modalbox error col-sm-8 col-md-6 col-lg-5 center animate" style="display: none;">
                            <div class="icon">
                                <span class="glyphicon glyphicon-thumbs-down"></span>
                            </div>
                            <h1>Oh no!</h1>
                            <p>Oops! Something went wrong,
                                <br> you should try again.</p>
                            <button type="button" class="redo btn">Try again</button>
                            <span class="change">-- Click to see opposite state --</span>
                        </div>
                    </div>-->
</div>

</body>
<script src="folder/js.js" type="text/javascript"></script>
</html>

$(document).ready(function () {
 

    $(window).resize(function () {
        var bodyheight = $(this).height();
        var bodywidth = $(this).width();
        if (bodyheight >= 320) {
            $("#pedometer").height(230);
            $("#pedometer").width(230);
            $("#loader").height(230);
            $("#loader").width(230);
        } else if (bodywidth >= 500) {
            $("#login").width(280);
        }
    }).resize();
    
    $("#mark-all-btn").on("click",function() {
        
     $('.redx').hide();
      $('.greenTick').show();
    
    });

    
     $("#submitAtt").on("click",function() {
         
        var text = 1;
        //creating ajax object
        $.ajax({
            //method is post
            type: 'POST',
            // send the data to another PHP file 
            url: 'setAttendance.php',
            //data to send
            data: {attendance: text},
            success: function () {
               $("#mark-all-btn").hide();
               $("#submitAtt").hide();
               
               $("#attendanceRecordedMessage").show();
         
            }
            
               });
      
});
    
});

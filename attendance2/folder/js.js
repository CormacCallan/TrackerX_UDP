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

    $("#mark-all-btn").click(function () {
        $(this).text($(this).text() === 'Mark all as Present' ? 'Mark all as Absent' : 'Mark all as Present');
        $('.redx').toggle();
        $('.greenTick').toggle();
    });


    $("#submitAtt").on("click", function () {

        var text = $("#redOrGreen").text();
        //creating ajax object
        $.ajax({
            //method is post
            //   type: 'POST',
            // send the data to another PHP file 
            //   url: 'setAttendance.php',
            //data to send
            data: {status: text},
            success: function () {
                $("#btns").hide();
                $(".greenTable").hide();
                $(".subject_detail").hide();
                $("#attendance_recorded").fadeIn();

            }

        });

    });
    
     function getCurrentStudentClass() {
  
                $.ajax({ 
                    type:'GET',          
                    url: 'getCurrentStudentClass.php',
                    dataType: 'html',  
                    success: function (data) {
                     $('#displayStudentCurrentClass').html(data).fadeIn(3000);                     
                    }
                });

           }
            setInterval(getCurrentStudentClass, 1000);
            
         function getCurrentLecturerClass() {
  
                $.ajax({ 
                    type:'GET',          
                    url: 'getCurrentLecturerClass.php',
                    dataType: 'html',  
                    success: function (data) {
                     $('#displayLecturerCurrentClass').html(data).fadeIn(3000); 
                     $('#lecture-btns').show();
                    }
                });

           }
           function liveCount(){
        
 $.ajax({
            url: 'liveCount.php',
            type: 'GET',
            dataType: 'html',
            success: function (data) {
             
                $('#count_').html("Live Count:"+data);
            }
        });
    }
    
 $.ajax({
            url: 'getLecturerName.php',
            type: 'GET',
            dataType: 'html',
            success: function (data) {
             
                $('#lecturer_name').html("Welcome :"+data);
            }
        });

  $.ajax({
            url: 'getLecturerName.php',
            type: 'GET',
            dataType: 'html',
            success: function (data) {
            $('#lecturer_name').html("Welcome :"+data);
            }
        });
setInterval(liveCount, 1000);
            setInterval(getCurrentLecturerClass, 1000);   
            

});



function getWeek() {
    var displayHtml = "<div class='container'>";
    var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    var weeks = ['Sun', "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
    var date = new Date();
    var day = date.getDay();
    for (var i = 1; i < 6; i++) {
        if (i - day != 0) {
            var days = i - day;
            var newDate = new Date(date.getTime() + (days * 24 * 60 * 60 * 1000));
            displayHtml += "<div class='day modalbox success center animate' onclick='changeClass(" + weeks[newDate.getDay()] + ")'>";
            displayHtml += "<div class='time'>" + newDate.getDate() + "  " + months[newDate.getMonth()] + "</div><div class='time'>" + weeks[newDate.getDay()] + "</div>";
            displayHtml += "</div>";
        } else {
            displayHtml += "<div class='day modalbox success center animate' onclick='changeClass(" + weeks[date.getDay()] + ")'>";
            displayHtml += "<div class='time'>" + date.getDate() + "  " + months[date.getMonth()] + "</div><div class='time'>" + weeks[date.getDay()] + "</div>";
            displayHtml += "</div>";
        }
    }
    displayHtml += "</div>";
    document.getElementById('timeDisplay').innerHTML = displayHtml;
}

function changeClass(day) {
//    $('').fadeOut("fast", function () {
//        $(day).fadeIn("fast");
//    });
    $('.timetable').hide(); // this or use css to hide the div
    $(day).delay().fadeIn('fast');

}

/* current clock*/

function getCurrentTime() {
    var day = new Date();
    var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    var month = months[day.getMonth()];
    var year = day.getFullYear();
    var date = day.getDate();
    var hour = day.getHours();
    var min = day.getMinutes();
    var sec = day.getSeconds();

    var displayHtml = "<ul>";
    displayHtml += "<li><h1>Current Date</h1><span class='foldable'><span>" + year + "</span><span>" + month + "</span><span>" + date + "</span></li>";
    displayHtml += "<li><h1>Current Time</h1><span class='foldable'><span>" + hour + "</span><span>" + min + "</span><span>" + sec + "</span></li>";
    displayHtml += "</ul>";

    document.getElementById('clock').innerHTML = displayHtml;
}
setInterval(getCurrentTime, 1000);





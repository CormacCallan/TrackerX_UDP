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
    $("#mark-all-btn").on("click", function () {
        $('.redx').hide();
        $('.greenTick').show();
    });


    $("#submitAtt").on("click", function () {
        var text = 1;
        //creating ajax object
        $.ajax({
            //method is post
            type: 'POST',
            // send the data to another PHP file 
            url: 'setAttendance.php',
            //data to send
            data: {status: text},
            success: function () {
                $("#mark-all-btn").hide();
                $("#submitAtt").hide();
                $("#attendance_recorded").show();
            }
        });
    });

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

$("#mark-all-btn").on("click", function () {

    $('.redx').hide();
    $('.greenTick').show();

});


$("#submitAtt").on("click", function () {

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

setInterval(getCurrentTime, 1000);

/* student_SignIn.php focus input*/

$(".inputs").keyup(function () {
    if (this.value.length == this.maxLength) {
      $(this).next('.inputs').focus();
    }
});


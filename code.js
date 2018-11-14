$('document').ready(function ()
{
       $("#attendance_recorded").hide();

    /* validation */
    $("#record-form").validate({
        rules:
                {
                    code: {
                        required: true
                    }
                  
                },
        messages:
                {
                    code: {
                        required: "Please enter code"
                    }
                   


         },
        submitHandler: submitForm
    });
    /* validation */

    /* login submit */
    function submitForm()
    {
        var data = $("#record-form").serialize();

        $.ajax({
            type: 'POST',
            url: 'code.php',
            data: data,
            beforeSend: function ()
            {
             
                $("#error").fadeOut();
            },
            success: function (response)
            {
                if (response == "Attendance recorded") 
                {
                     $("#record-form").fadeOut();
                    $("#attendance_recorded").fadeIn();

                } 
                else if (response == "Wrong code") 
                {
                    $("#error").fadeIn(1000, function () 
                    {
                        $("#error").html('<center><h3>'+ response +'</h3></center>');
                    });
                }
                
                
            }
        });
        return false;
    }
    /* login submit */
});
$('document').ready(function ()
{
    /* validation */
    $("#login-form").validate({
        rules:
                {
                    password: {
                        required: true
                    },
                    username: {
                        required: true
                    }
                },
        messages:
                {
                    password: {
                        required: "Please enter your password"
                    },
                    username: {
                        required: "Please enter your username"
                    }


         },
        submitHandler: submitForm
    });
    /* validation */

    /* login submit */
    function submitForm()
    {
        var data = $("#login-form").serialize();

        $.ajax({
            type: 'POST',
            url: 'login_process.php',
            data: data,
            beforeSend: function ()
            {
                $("#error").fadeOut();
            },
            success: function (response)
            {
                if (response === "ok") 
                {
                    setTimeout(' window.location.href = "student.php"; ', 4000);
                } 
                else if (response === "Invalid login, please try again") 
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
$('document').ready(function ()
{
    /* validation */
    $("#login-form").validate({
        rules:
                {
                    password: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    }
                },
        messages:
                {
                    password: {
                        required: "Please enter your password"
                    },
                   
            email: "please enter your email address"


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
            url: 'login_process2.php',
            data: data,
            beforeSend: function ()
            {
                $("#error").fadeOut();
            },
            success: function (response)
            {
                if (response == "ok") 
                {
                    setTimeout(' window.location.href = "lecturer.php"; ', 4000);
                } 
                else if (response == "Invalid login, please try again") 
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
$('document').ready(function ()
{
    $('#timerDisplay').hide();
    $('#timerButtons').hide();
    $("#inputMin").attr("maxlength", 2);
    $("#inputSec").attr("maxlength", 2);
     
    
  
  
    
  
    var maxSecs = 59;
     
    var timer;
    var min = $("#inputMin").val();
    var sec = $("#inputSec").val();
    
  
   
   
    
  
    
 

 $(".time").on("keypress keyup blur",function (event) {    
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });

 $("#inputMin").keyup(function () {
    
    min = $(this).val();
    
    if(min === "" || min > 1)
    {
       min = 0;
       $("#inputMin").val("00");
    }
    
    
 });
 
 
 
 $("#inputSec").keyup(function () {
      
    sec = $(this).val();
    
     if(sec === "" || sec.toString().length < 2)
    {
         $('#submitTime').prop('disabled', true); //TO DISABLED 
    }
    else
    {
        $('#submitTime').prop('disabled', false); //TO ENABLE
    }
    
    
    if(sec > maxSecs)
    {
        $("#inputMin").val("01");
        $("#inputSec").val("00");
        
        min = 1;
        sec = 0;
        
    }
  
 });
 
 

$("#submitTime").on("click",function() {
   
  
    $('#timerDisplay').text(min + ":" + sec); 
    $('#timerDisplay').show();
    $('#timerButtons').show();
    $('#editTime').hide();
       
});

$("#editTimebtn").on("click",function() {
   
    $('#timerDisplay').hide();
    $('#timerButtons').hide();
    $('#editTime').show();
    
    clearInterval(timer);
    timer = false;
    $('#timerDisplay').text(min + ":" + sec); 
   
   

     
});


$("#start").on("click",function() {
    
   if(!timer)
   { //setinterval will repeat the countdown function every second (1000 millisecs) 
        timer = setInterval(countdown,1000);
   }
   
});


$('#reset').on('click', function(){
  
   min = $("#inputMin").val();
   sec = $("#inputSec").val();
   $('#timerDisplay').text(min + ':' + sec);
    
});

$("#stop" ).on("click",function() {
 clearInterval(timer);
 timer = false;
});

    
       
    function countdown(){
      
        $('#timerDisplay').text(min + ':' + sec);
        sec--;
        
        if(sec < 0)
        {
            min--;
            sec = 59;
        }
       
        if (min < 0) 
        { 
           
          
            $('#timerDisplay').text("00:00");
            min = $("#inputMin").val();
   sec = $("#inputSec").val();
        } 
        
        if(sec.toString().length < 2)
        {
           sec = '0'+ sec;
        }
        
        if(min.toString().length < 2)
        {
            min = '0' + min;
        }
             
}

});
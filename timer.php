<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
                <link href="folder/main.css" rel="stylesheet" type="text/css"/>

          <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

        <script type="text/javascript" src="timer.js"></script>

        <title></title>
    </head>
    <body>
       
<h2>Adjust Timer</h2>


<div id="editTime" >
  <label>Refresh Time:</label> 
  <input type="text" id="inputMin" value="00"  size="1" class="time"><b>:</b><input type="text" id="inputSec" value="30"  size="1" class="time">
  <input type="submit" value="submit" id="submitTime">
</div>




  <p id="timerDisplay"></p>
  
  
 
  <div id="timerButtons">
       <button id="start">start</button> <button id="reset">reset</button> <button id="stop">stop</button> <button id="editTimebtn">Edit Duration</button>
  </div>

<!--  <div id="circle">&nbsp;</div>-->


    </body>
</html>

<!DOCTYPE html>
<!--
    Prompt user to enter their username to locate account
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            body {
                background-color:rgb(21, 118, 221);
                color:white;
                background-image:url("http://www.clker.com/cliparts/0/4/C/O/g/t/doctor-and-patient-blue.svg.med.png");
                background-position: right bottom;
                background-repeat:no-repeat;
                background-attachment:fixed;
            }
            
        </style>
        
    </head>
    <body>
        
        <h1 style="font-size:70px;"> 
            <img src="Symbol.png" width="60" height="60">
            EMIS <hr>  
        </h1>
        <p> 
            Please Enter the Following Information to Locate Account:
        </p>
        <br>
        <form action="CheckInfoPW.php" method="POST">
            <input type="radio" name="role" value="Patient" checked> Patient<br>
            <input type="radio" name="role" value="Employee"> Employee<br>
            <div><label for="">Username: 
            <input type="text" name="user" id="user"></label>
            </div>
            <div><input type="submit" value="Submit"></div>
        </form>
        
    </body>
</html>


<!DOCTYPE html>
<!--
    Prompts user to enter some personal information to obtain username
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
            Please Enter the Following Information to Obtain Username:
        </p>
        <br>
        <form action="CheckInfoUser.php" method="POST">
            <input type="radio" name="role" value="Patient" checked> Patient<br>
            <input type="radio" name="role" value="Employee"> Employee<br>
            <div><label for="first">First Name: 
            <input type="text" name="first" id="first"></label>
            </div>
            <div><label for="last">Last Name:
            <input type="text" name="last" id="last"></label>
            </div>
            <div><label for="ssn">Social Security Number:
            <input type="number" name="ssn" id="ssn"></label>
            </div>
            <div><input type="submit" value="Submit"></div>
        </form>
        
    </body>
</html>


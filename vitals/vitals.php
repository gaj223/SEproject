<!DOCTYPE html>
<!--
    Creates the Create Patient Account Page
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
        
        <h1 style="font-size:40px;"> 
            <img src="../Symbol.png" width="60" height="60">
            EMIS <hr>  
        </h1>
        <p>Update Vitals: </p>
        <form action="InsertData.php" method="POST">
            <br>
            <div><label for="date">Date:		
                    <input type="date" name="date" id="date"></label>
            </div>
            <div><label for="bpressure">Blood Pressure:
                    <input type="text" name="bpressure" id="bpressure"></label>
            </div>
            <div><label for="temp">Body Temperature:
            <input type="text" name="temp" id="temp"></label>
            </div>
	    <div><label for="hrate">Heart Rate:
	    <input type="text" name="hrate" id="hrate"></label>
	    </div>
	    <div><label for="patient">Identification (Email or SSN):
	    <input type="text" name="patient" id="patient"></label>
	    </div>
            <div><input type="submit" value="Submit"></div>
        </form>
        
       
    </body>
</html>


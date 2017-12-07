<!--
    Update the user's password
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Page Title</title>
        <style>
            body {
                background-color:rgb(21, 118, 221);
                color:white;
                background-image:url("http://www.clker.com/cliparts/0/4/C/O/g/t/doctor-and-patient-blue.svg.med.png");
                background-position: right bottom;
                background-repeat:no-repeat;
                background-attachment:fixed;
                font-size:20px;
            }
            
        </style>
    </head>
    <body>
        <h1 style="font-size:70px;"> 
            <img src="Symbol.png" width="60" height="60">
            EMIS <hr>  
        </h1>
        <?php 
            //include 'include/db.emis';
            // Connect to SQL
            $host = "localhost";
            $user = "root";
            $password = "cs3773";
            $database = "EMIS";
            $con = mysqli_connect($host, $user, $password, $database);
            
            if (!$con) {
                exit('Connect Error (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error());
            }
            
            //set the default client character set
            mysqli_set_charset($con, 'utf-8');
            
            $role = htmlentities($_POST["role"]);
            $ID = htmlentities($_POST["ID"]);
            $new = htmlentities($_POST["new"]);
            if($role == "Patient"){
                $patient = mysqli_query($con, "UPDATE PatientLogin SET PassWord='" . $new . "' WHERE PatientID='" . $ID . "'");
                mysqli_query($con, "UPDATE PatientLogin SET Locked='No' WHERE PatientID='" . $ID . "'");
                mysqli_query($con, "UPDATE PatientLogin SET attempts= '0' WHERE Email='" . $user . "'");
                echo 'Password Changed';
                
                // Free mysql query
                mysqli_free_result($patient);
            }else{
                
                $employee = mysqli_query($con, "UPDATE EmployeeLogin SET Password='" . $new . "' WHERE EmployeeID='" . $ID . "'");
                mysqli_query($con, "UPDATE EmployeeLogin SET Locked='No' WHERE EmployeeID='" . $ID . "'");
                mysqli_query($con, "UPDATE EmployeeLogin SET attempts= '0' WHERE Email='" . $user . "'");
                echo 'Password Changed';
                
                // Free mysql query
                mysqli_free_result($employee);
            }
            
        ?>
        
        <p style="font-size:30px;text-align:left;"> 
             <br>
            <a href="Index.php"> Home Page</a> <br>
            
        </p>
       
    </body>
</html>


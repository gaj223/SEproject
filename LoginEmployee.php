<!DOCTYPE html>
<!--
Validates the employee and create the Welcome page for the employee
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
                font-size:60px;
                text-align:center;
            }
            
        </style>
    </head>
    <body>
        
        <?php 
             
            include 'include/db.emis';

            // Check to see if username and password is correct
            $user = htmlentities($_POST["user2"]);
            $passwrd =  htmlentities($_POST["passwrd2"]);
            
            // check if user is in the database
            $employeeUsr = mysqli_query($con, "SELECT FirstName FROM EmployeeLogin WHERE Email='" . $user . "'");
            if (mysqli_num_rows($employeeUsr) < 1) {
                exit("Username or Password is incorrect");
            }
            $row = mysqli_fetch_row($employeeUsr);
            $firstNm = $row[0];
            
            // Check if password is correct
            $employeePW = mysqli_query($con, "SELECT PassWord FROM EmployeeLogin WHERE Email='" . $user . "'");
            $row = mysqli_fetch_row($employeePW);
            if ($passwrd != $row[0]) {
                exit("Username or Password is incorrect");
            }
  
            
            echo 'Welcome to EMIS, '. $firstNm ."<br/>";
            
            // Free mysql query
            mysqli_free_result($employeePW);
            mysqli_free_result($employeeUsr);
            

            
            
        ?>
        <p style="font-size:30px;text-align:left;"> 
            Menu: <br>
            <a href="Search.php"> Search</a> <br>
            <a href="Create Appointment.php"> Create Appointment</a> <br>
        </p>
        
    </body>
</html>


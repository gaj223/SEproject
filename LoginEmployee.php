<!DOCTYPE html>
<!--
Validates the employee and create the Welcome page for the employee
-->
<?php
    session_start()
?>
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
             
            //include 'include/db.emis';
            // Connect to SQL
            $host = "localhost";
            $user = "root";
            $password = "root";
            $database = "EMIS";
            $con = mysqli_connect($host, $user, $password, $database);
            
            if (!$con) {
                exit('Connect Error (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error());
            }
            
            //set the default client character set
            mysqli_set_charset($con, 'utf-8');

            // Check to see if username and password is correct
            $user = htmlentities($_POST["user2"]);
            $passwrd =  htmlentities($_POST["passwrd2"]);
            $_SESSION['CurrentUser'] = $user;
            
            // check if user is in the database
            $employeeUsr = mysqli_query($con, "SELECT FirstName FROM EmployeeLogin WHERE Email='" . $user . "'");
            if (mysqli_num_rows($employeeUsr) < 1) {
                exit("Username or Password is incorrect");
            }
            $row = mysqli_fetch_row($employeeUsr);
            $firstNm = $row[0];
            
            $pas = mysqli_query($con, "SELECT EmployeeID FROM EmployeeLogin WHERE Email='" . $user . "'");
            $pass = $pas->fetch_assoc();
            
            // Check if password is correct
            $employeePW = mysqli_query($con, "SELECT Password FROM EmployeeLogin WHERE Email='" . $user . "'");
            $row = mysqli_fetch_row($employeePW);
            if ($passwrd != $row[0]) {
                exit("Username or Password is incorrect");
            }
  
            
            echo 'Welcome to EMIS, '. $firstNm ."<br/>";
            
            // Free mysql query
            mysqli_free_result($employeePW);
            mysqli_free_result($employeeUsr);
            

            
            
        ?>
        <h1 style="font-size:20px;text-align:right;"> 
            <a href="Logout.php"> Logout</a>
        </h1>
        <p style="font-size:30px;text-align:left;"> 
            Menu: <br>
            <a href="search.php?employeeid=<?php echo $pass['EmployeeID']; ?>"> Search</a> <br>
            <a href="CreateAppointment.php"> Create Appointment</a> <br>
            <a href="CreatePatientAccount.php"> Create a New Patient Account</a> <br>
        </p>
        
    </body>
</html>


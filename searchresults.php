<!DOCTYPE html>
<!--
    Prompt user to enter login information
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
        
        <?php 
        
            //include 'db.emis';
        
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
            
            if ($_POST['fname'] == NULL || $_POST['lname'] == NULL || $_POST['dob'] == NULL){
                if ($_SESSION['POST'] == null){
                    session_start();
                }
                $_SESSION['POST'] = $_POST;
                header("Location:search.php");
            } else {
                session_start();
                $_SESSION['POST'] = $_POST;
            }
            
            // Check to see if username and password is correct
            $fname = htmlentities($_POST["fname"]);
            $lname =  htmlentities($_POST["lname"]);
            $dob =  htmlentities($_POST["dob"]);
            $employeeid = $_POST['employeeid'];
            
            // check if user is in the database
            $patient = mysqli_query($con, "SELECT PatientID FROM PatientPersonalInfo WHERE FirstName REGEXP '[[:<:]]{$fname}[[:>:]]' AND LastName REGEXP '[[:<:]]{$lname}[[:>:]]' AND DateOfBirth REGEXP '[[:<:]]{$dob}[[:>:]]'");
            if (mysqli_num_rows($patient) < 1) {
                if ($_SESSION['POST'] == null){
                    session_start();
                }
                $_SESSION['POST'] = $_POST;
                header("Location:search.php");
            }
            
            $pass = $patient->fetch_assoc();
            
  
            // Get Patient's Name 
            $patientNm = mysqli_query($con, "SELECT FirstName FROM PatientPersonalInfo WHERE Email='" . $user . "'");
            $row = mysqli_fetch_row($patientNm);
            
        ?>
        <p style="font-size:30px;text-align:left;"> 
        <h1>Patient Found</h1>
            Menu: <br>
            <a href="SearchPersonalInfo.php?patientid=<?php echo $pass['PatientID']; ?>"> Personal Information</a> <br>
            <a href="InsuranceInfo.php"> Insurance Information</a> <br>
            <a href="Appointments.php"> Appointments</a> <br>
        <form action="search.php" method="get">
            <input type="hidden" name="employeeid" value="<?php echo $employeeid;?>"/>
            <div><input type="submit" value="Back to Search"></div>
        </form>
        </p>
        
    </body>
</html>
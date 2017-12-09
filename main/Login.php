<!DOCTYPE html>
<!--
    Prompt user to enter login information
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
        
            include '../include/db.emis';
            // Check to see if username and password is correct
            $user = htmlentities($_POST["user"]);
            $passwrd =  htmlentities($_POST["passwrd"]);
            
            // check if user is in the database
            /*$patientUsr = mysqli_query($con, "SELECT Email FROM PatientLogin WHERE Email='" . $user . "'");
            if (mysqli_num_rows($patientUsr) < 1) {
                exit("Username or Password is incorrect");
            }
            
            $pass = $patientUsr->fetch_assoc();
            //echo $row['PatientID'];
            */
            // Check if password is correct
            $patientPW = mysqli_query($con, "SELECT PassWord FROM PatientLogin WHERE Email='" . $user . "' AND PassWord='" . $passwrd . "'");
            $row = mysqli_fetch_array($patientPW);
            if ($passwrd != $row[0]) {
                exit("Username or Password is incorrect");
            }
  
            // Get Patient's Name
            $patientNm = mysqli_query($con, "SELECT FirstName FROM PatientPersonalInfo WHERE Email='" . $user . "'");
            $row = mysqli_fetch_row($patientNm);
            echo 'Welcome to EMIS, '. $row[0]."<br/>";
            
            // Free mysql query
            mysqli_free_result($patientPW);
            mysqli_free_result($patientUsr);
            mysqli_free_result($patientNm);
            
        ?>
        <p style="font-size:30px;text-align:left;">
            Menu: <br>
            <a href="../personal/PersonalInfo.php?patientid=<?php echo $pass['PatientID']; ?>"> Personal Information</a> <br>
            <a href="../insurance/InsuranceInfo.php"> Insurance Information</a> <br>
            <a href="../appointments/appointment.php"> Appointments</a> <br>
        </p>
        
    </body>
</html>

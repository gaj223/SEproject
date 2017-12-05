<!DOCTYPE html>
<!--
    Verify the user's information and give username
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
            $role = htmlentities($_POST["role"]);
            $first =  htmlentities($_POST["first"]);
            $last =  htmlentities($_POST["last"]);
            $ssn = htmlentities($_POST["ssn"]);
            // Check to see if a patient or employee
            if ($role == "Patient"){
                $patientInfo = mysqli_query($con, "SELECT FirstName, LastName, Email FROM PatientPersonalInfo"
                    . " WHERE SSN='" . $ssn . "'");
            
                if (mysqli_num_rows($patientInfo) < 1) {
                    exit("Information does match our system. 1");
                } 
            
                // Retrieve the Patient's info
                $row = mysqli_fetch_row($patientInfo);
                
                // Free mysql query
                mysqli_free_result($patientInfo);
                
            }else{
                $employeeInfo = mysqli_query($con, "SELECT FirstName, LastName, Email FROM EmployeeLogin"
                    . " WHERE SSN='" . $ssn . "'");

            
                if (mysqli_num_rows($employeeInfo) < 1) {
                    exit("Information does match our system. ");
                } 
            
                // Retrieve the Employee's info
                $row = mysqli_fetch_row($employeeInfo);   
                
                // Free mysql query
                mysqli_free_result($employeeInfo);
            }
            
            
            //Check first and last name
            $firstNm = $row[0];
            $lastNm = $row[1];
            if ($firstNm != $first || $lastNm != $last){
                exit("Information does match our system. ");
            }
            
            // Display Username
            $email = $row[2];
            echo 'Your username is '. $email."<br/>";

            
            
        ?>
        <p style="font-size:30px;text-align:left;"> 
             <br>
            <a href="Index.php"> Home Page</a> <br>
            
        </p>
        
    </body>
</html>


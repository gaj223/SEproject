<!DOCTYPE html>
<!--
    Check to see if user exists and show the security questions
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
        
        <?php 
            include 'include/db.emis';

            // Check to see if username and password is correct
            $user =  htmlentities($_POST["user"]);
            $role2 = htmlentities($_POST["role"]);
            if($role2 == "Patient"){
                $patientUsr = mysqli_query($con, "SELECT PatientID FROM PatientLogin WHERE Email='" . $user . "'");
                if (mysqli_num_rows($patientUsr) < 1) {
                    exit("Username does not exist");
                }
                // Retrieve the Patient's ID
                $row = mysqli_fetch_row($patientUsr);
                
                // Free mysql query
                mysqli_free_result($patientPW);
            }else{
                $employeeUsr = mysqli_query($con, "SELECT EmployeeID FROM EmployeeLogin WHERE Email='" . $user . "'");
                if (mysqli_num_rows($employeeUsr) < 1) {
                    exit("Username does not exist");
                }
                // Retrieve the Patient's ID
                $row = mysqli_fetch_row($employeeUsr);
                
                // Free mysql query
                mysqli_free_result($employeeUsr);
            }
            
            // hold the employeee or patient ID
            $ID = $row[0];
            
        ?>
        
        <form action="SecurityQuestions.php" method="POST">
            <div><label for="ans1"> 
                <?php 
                    // Get Security Question 1
                    if($role2 == "Patient"){
                        $secur1 = mysqli_query($con, "SELECT SecurityQuest1 FROM PatientLogin WHERE PatientID='" . $ID . "'");
                        $row = mysqli_fetch_row($secur1);
                        
                    }else{
                        $secur1 = mysqli_query($con, "SELECT SecurityQuest1 FROM EmployeeLogin WHERE EmployeeID='" . $ID . "'");
                        $row = mysqli_fetch_row($secur1);
                    }
                    echo "Security Question 1: " . $row[0] . "";
                
                ?> 
            <input type="text" name="ans1" id="ans1"></label>
            </div>
            <div><label for="ans2">
                <?php 
                    // Get Security Question 2
                    if($role2 == "Patient"){
                        $secur2 = mysqli_query($con, "SELECT SecurityQuest2 FROM PatientLogin WHERE PatientID='" . $ID . "'");
                        $row = mysqli_fetch_row($secur2);
                        
                    }else{
                        $secur2 = mysqli_query($con, "SELECT SecurityQuest2 FROM EmployeeLogin WHERE EmployeeID='" . $ID . "'");
                        $row = mysqli_fetch_row($secur2);
                    }
                    echo "Security Question 2: " . $row[0] . "";
                    
                ?>
            <input type="text" name="ans2" id="ans2"></label>
            </div>
            <div> <input type="hidden" name="role2" value="<?php echo $role2; ?>"> </div>
            <div> <input type="hidden" name="ID" value="<?php echo $ID; ?>"> </div>
            <div><input type="submit" value="Submit"></div>
        </form>
        
    </body>
</html>


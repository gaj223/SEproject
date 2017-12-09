<!--
    Check the user's answers to the security questions
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
            
            $role = htmlentities($_POST["role2"]);
            $ans1 = htmlentities($_POST["ans1"]);
            $ans2 = htmlentities($_POST["ans2"]);
            $ID = htmlentities($_POST["ID"]);
            if($role == "Patient"){
                $patient = mysqli_query($con, "SELECT SecurityAns1,SecurityAns2 FROM PatientLogin WHERE PatientID='" . $ID . "'");
                
                // Retrieve the Patient's answers
                $row = mysqli_fetch_row($patient);
                
                // Check to see if responses are correct
                if ($ans1 != $row[0] || $ans2 != $row[1]){
                    exit("The information you provided does not match our records.");
                }
                
                // Free mysql query
                mysqli_free_result($patient);
            }else{
                
                $employee = mysqli_query($con, "SELECT SecurityAns1,SecurityAns2 FROM EmployeeLogin WHERE EmployeeID='" . $ID . "'");
               
                // Retrieve the Employee's answers
                $row = mysqli_fetch_row($employee);
                // Check to see if responses are correct
                if ($ans1 != $row[0] || $ans2 != $row[1]){
                    exit("The information you provided does not match our records.");
                }
                
                // Free mysql query
                mysqli_free_result($employee);
            }
            
        ?>
        
        <form action="ChangePW.php" method="POST">
            <div><label for="new">Enter new password: 
            <input type="text" name="new" id="new"></label>
            </div>
            <div><label for="new2">Reenter new password:
            <input type="text" name="new2" id="new2"></label>
            </div>
            <div> <input type="hidden" name="ID" value="<?php echo $ID; ?>"> </div>
            <div> <input type="hidden" name="role" value="<?php echo $role; ?>"> </div>
            <div><input type="submit" value="Submit"></div>
        </form>
    </body>
</html>




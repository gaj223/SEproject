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
            p {
                font-size: 15px;
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
        <h1 style="font-size:70px;"> 
            <img src="Symbol.png" width="60" height="60">
            EMIS <hr>  
        </h1>
        <form action="ChangePW.php" method="POST">
            <div><label for="new">Enter new password: 
            <input type="text" name="new" id="new" 
                   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                   title="Must contain at least one number and one uppercase 
                   and lowercase letter, and at least 8 or more characters"
                   required> </label>
            </div>
            <div> <input type="hidden" name="ID" value="<?php echo $ID; ?>"> </div>
            <div> <input type="hidden" name="role" value="<?php echo $role; ?>"> </div>
            <div><input type="submit" value="Submit"></div>
            <div id="message">
                <h3>Password must contain the following:</h3>
                <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                <p id="number" class="invalid">A <b>number</b></p>
                <p id="special" class="invalid">A <b>special character</b></p>
                <p id="length" class="invalid">Minimum <b>8 characters</b></p>
            </div>
        </form>
    </body>
</html>




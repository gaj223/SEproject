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
        
        <?php 
            include 'include/db.emis';
            
            $role = htmlentities($_POST["role"]);
            $ID = htmlentities($_POST["ID"]);
            $new = htmlentities($_POST["new"]);
            $new2 = htmlentities($_POST["new2"]);
            if($role == "Patient"){
                $patient = mysqli_query($con, "UPDATE PatientLogin SET PassWord='" . $new . "' WHERE PatientID='" . $ID . "'");
                
                echo 'Password Changed';
                
                // Free mysql query
                mysqli_free_result($patient);
            }else{
                
                $employee = mysqli_query($con, "SELECT EmployeeLogin SET PassWord='" . $new1 . "' WHERE EmployeeID='" . $ID . "'");
               
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


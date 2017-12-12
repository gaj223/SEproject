<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Page Title</title>
        <?php
        if ($_POST == NULL){
            session_start();
            $temp = $_SESSION['POST'];
            $_POST['employeeid'] = "$temp[employeeid]";            
            unset($_SESSION['POST']);
            echo "true";
            echo $_POST['employeeid'];
        }
        if ($_GET == NULL){
            $patientid = $_POST['patientid'];
        } else {
            $patientid = $_GET['patientid'];
        }
        $servername = "localhost";
        $username = "root";
        $password = "cs3773";
        $dbname = "EMIS";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        $ptest = "SELECT * FROM employeelogin WHERE EmployeeID REGEXP '[[:<:]]{$_POST['employeeid']}[[:>:]]'";
        $vptest = $conn->query($ptest);
        $testvariables = $vptest->fetch_assoc();
        ?>
        <script language="javascript">
            
            function permission() {
                var x = "<?php echo $testvariables['Permission'];?>"
                //var x = "<?php echo $_POST['employeeid'];?>";
                if (x < 1){
                    document.getElementById("editbutton").style.visibility="hidden";
                }                
            }
        </script>
    </head>
    <body style="background-color:rgb(8, 133, 229);color:White;font-size:30px;" onload="permission()">
        <h1 style="color:White;font-size:60px;">Personal Information</h1>
        
        <?php
        /*
        if ($_POST == NULL){
            session_start();
            $temp = $_SESSION['POST'];
            $_POST['employeeid'] = "$temp[employeeid]";            
            unset($_SESSION['POST']);
        }
        if ($_GET == NULL){
            $patientid = $_POST['patientid'];
        } else {
            $patientid = $_GET['patientid'];
        }
        
        $servername = "localhost";
        $username = "root";
        $password = "1234";
        $dbname = "emis";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
         
        */

        $safety = "SELECT * FROM patientpersonalinfo WHERE PatientID REGEXP '[[:<:]]{$patientid}[[:>:]]'";
        $verify = $conn->query($safety);
        $pas = $verify->fetch_assoc();
        

        if (isset($_GET['company'])){
            if ($_GET['company'] != null){
                // $changems = "UPDATE personalinformation SET married = \"" . $_POST['mstatus'] . "\" WHERE lastname LIKE \"%" . $lname . "%\" AND firstname LIKE \"%" . $fname . "%\" AND dob LIKE \"" . $dob . "\"";
                $changems = "UPDATE patientinsuranceinfo SET Company = \"" . $_GET['company'] . "\" WHERE PatientID REGEXP '[[:<:]]{$patientid}[[:>:]]'";
                $huh = $conn->query($changems);
                if (!$huh){
                    echo "Error: " . $changems . "<br>" . $conn->error;
                }
            }
        }
        if (isset($_GET['group'])){
            if ($_GET['group'] != null){
                //$changeadd = "UPDATE personalinformation SET address = \"" . $_POST['address'] . "\" WHERE lastname LIKE \"%" . $lname . "%\" AND firstname LIKE \"%" . $fname . "%\" AND dob LIKE \"" . $dob . "\"";
                $changeadd = "UPDATE patientinsuranceinfo SET GroupID = \"" . $_GET['group'] . "\" WHERE PatientID REGEXP '[[:<:]]{$patientid}[[:>:]]'";
                $huh = $conn->query($changeadd);
                if (!$huh){
                    echo "Error: " . $changeadd . "<br>" . $conn->error;
                }
            }
        }
        if (isset($_GET['member'])){
            if ($_GET['member'] != null){
                //$changeem = "UPDATE personalinformation SET email = \"" . $_POST['email'] . "\" WHERE lastname LIKE \"%" . $lname . "%\" AND firstname LIKE \"%" . $fname . "%\" AND dob LIKE \"" . $dob . "\"";
                $changeem = "UPDATE patientinsuranceinfo SET MemberID = \"" . $_GET['member'] . "\" WHERE PatientID REGEXP '[[:<:]]{$patientid}[[:>:]]'";
                $huh = $conn->query($changeem);
                if (!$huh){
                    echo "Error: " . $changeem . "<br>" . $conn->error;
                }
            }
        }

        //$test = "SELECT * FROM personalinformation WHERE lastname LIKE \"%" . $lname . "%\" AND firstname LIKE \"%" . $fname . "%\" AND dob LIKE \"%" . $dob . "%\"";
        $test = "SELECT * FROM patientinsuranceinfo WHERE PatientID REGEXP '[[:<:]]{$patientid}[[:>:]]'";

        $result = $conn->query($test);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "Insurance Provider: " . $row["Provider"] . "<br>" . 
                     "Group ID: " . $row["GroupID"] . "<br>" .
                     "Membership ID: " . $row["MemberID"] . "<br>";
            }
        } else {
            echo "0 results";
        }
        ?>
        <form action="SearchEditInsurance.php" method="post">
            <input type="hidden" name="patientid" value="<?php echo $patientid;?>"/>
            <input type="hidden" name="employeeid" value="<?php echo $_POST['employeeid'];?>" />
            <div id="editbutton"><input type="submit" value="Edit"/></div>
        </form>
        <form action="../jamesfiles/searchresults.php" method="post">
            <input type="hidden" name="fname" value="<?php echo $pas['firstname'];?>" />
            <input type="hidden" name="lname" value="<?php echo $pas['lastname'];?>" />
            <input type="hidden" name="dob" value="<?php echo $pas["dob"];?>" />
            <input type="hidden" name="employeeid" value="<?php echo $_POST['employeeid'];?>" />
            <div><input type="submit" value="Back"></div>
        </form>
    </body>
</html>


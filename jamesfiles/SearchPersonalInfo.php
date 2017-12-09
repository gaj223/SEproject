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
        $ptest = "SELECT * FROM employeelogin WHERE EmployeeID REGEXP '[[:<:]]{$_POST['employeeid']}[[:>:]]'";
        $vptest = $conn->query($ptest);
        $testvariables = $vptest->fetch_assoc();
        ?>
        <script language="javascript">
            
            function permission() {
                var x = "<?php echo $testvariables['Password'];?>"
                //var x = "<?php echo $_POST['employeeid'];?>";
                if (x > 1){
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
        

        if (isset($_POST['mstatus'])){
            if ($_POST['mstatus'] != null){
                // $changems = "UPDATE personalinformation SET married = \"" . $_POST['mstatus'] . "\" WHERE lastname LIKE \"%" . $lname . "%\" AND firstname LIKE \"%" . $fname . "%\" AND dob LIKE \"" . $dob . "\"";
                $changems = "UPDATE patientpersonalinfo SET married = \"" . $_POST['mstatus'] . "\" WHERE PatientID REGEXP '[[:<:]]{$patientid}[[:>:]]'";
                $huh = $conn->query($changems);
                if (!$huh){
                    echo "Error: " . $changems . "<br>" . $conn->error;
                }
            }
        }
        if (isset($_POST['address'])){
            if ($_POST['address'] != null){
                //$changeadd = "UPDATE personalinformation SET address = \"" . $_POST['address'] . "\" WHERE lastname LIKE \"%" . $lname . "%\" AND firstname LIKE \"%" . $fname . "%\" AND dob LIKE \"" . $dob . "\"";
                $changeadd = "UPDATE patientpersonalinfo SET address = \"" . $_POST['address'] . "\" WHERE PatientID REGEXP '[[:<:]]{$patientid}[[:>:]]'";
                $huh = $conn->query($changeadd);
                if (!$huh){
                    echo "Error: " . $changeadd . "<br>" . $conn->error;
                }
            }
        }
        if (isset($_POST['email'])){
            if ($_POST['email'] != null){
                //$changeem = "UPDATE personalinformation SET email = \"" . $_POST['email'] . "\" WHERE lastname LIKE \"%" . $lname . "%\" AND firstname LIKE \"%" . $fname . "%\" AND dob LIKE \"" . $dob . "\"";
                $changeem = "UPDATE patientpersonalinfo SET email = \"" . $_POST['email'] . "\" WHERE PatientID REGEXP '[[:<:]]{$patientid}[[:>:]]'";
                $huh = $conn->query($changeem);
                if (!$huh){
                    echo "Error: " . $changeem . "<br>" . $conn->error;
                }
            }
        }
        if (isset($_POST['pnumber'])){
            if ($_POST['pnumber'] != null){
                //$changepn = "UPDATE personalinformation SET phonenumber = \"" . $_POST['pnumber'] . "\" WHERE lastname LIKE \"%" . $lname . "%\" AND firstname LIKE \"%" . $fname . "%\" AND dob LIKE \"" . $dob . "\"";
                $changepn = "UPDATE patientpersonalinfo SET phonenumber = \"" . $_POST['pnumber'] . "\" WHERE PatientID REGEXP '[[:<:]]{$patientid}[[:>:]]'";
                $huh = $conn->query($changepn);
                if (!$huh){
                    echo "Error: " . $changepn . "<br>" . $conn->error;
                }
            }
        }
        if (isset($_POST['ecname'])){
            if ($_POST['ecname'] != null){
                //$changeecn = "UPDATE personalinformation SET ecname = \"" . $_POST['ecname'] . "\" WHERE lastname LIKE \"%" . $lname . "%\" AND firstname LIKE \"%" . $fname . "%\" AND dob LIKE \"" . $dob . "\"";
                $changeecn = "UPDATE patientpersonalinfo SET ecname = \"" . $_POST['ecname'] . "\" WHERE PatientID REGEXP '[[:<:]]{$patientid}[[:>:]]'";
                $huh = $conn->query($changeecn);
                if (!$huh){
                    echo "Error: " . $changeecn . "<br>" . $conn->error;
                }
            }
        }
        if (isset($_POST['ecpnumber'])){
            if ($_POST['ecpnumber'] != null){
                //$changeecp = "UPDATE personalinformation SET ecphonenumber = \"" . $_POST['ecpnumber'] . "\" WHERE lastname LIKE \"%" . $lname . "%\" AND firstname LIKE \"%" . $fname . "%\" AND dob LIKE \"" . $dob . "\"";
                $changeecp = "UPDATE patientpersonalinfo SET ecphonenumber = \"" . $_POST['ecpnumber'] . "\" WHERE PatientID REGEXP '[[:<:]]{$patientid}[[:>:]]'";
                $huh = $conn->query($changeecp);
                if (!$huh){
                    echo "Error: " . $changeecp . "<br>" . $conn->error;
                }
            }
        }
        if (isset($_POST['ecrelationship'])){
            if ($_POST['ecrelationship'] != null){
                //$changeecr = "UPDATE personalinformation SET ecrelation = \"" . $_POST['ecrelationship'] . "\" WHERE lastname LIKE \"%" . $lname . "%\" AND firstname LIKE \"%" . $fname . "%\" AND dob LIKE \"" . $dob . "\"";
                $changeecr = "UPDATE patientpersonalinfo SET ecrelation = \"" . $_POST['ecrelationship'] . "\" WHERE PatientID REGEXP '[[:<:]]{$patientid}[[:>:]]'";
                $huh = $conn->query($changeecr);
                if (!$huh){
                    echo "Error: " . $changeecr . "<br>" . $conn->error;
                }
            }
        }

        //$test = "SELECT * FROM personalinformation WHERE lastname LIKE \"%" . $lname . "%\" AND firstname LIKE \"%" . $fname . "%\" AND dob LIKE \"%" . $dob . "%\"";
        $test = "SELECT * FROM patientpersonalinfo WHERE PatientID REGEXP '[[:<:]]{$patientid}[[:>:]]'";

        $result = $conn->query($test);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "First Name: " . $row["firstname"] . "<br>" . 
                     "Last Name: " . $row["lastname"] . "<br>" .
                     "D.O.B: " . $row["dob"] . "<br>" .
                     "Gender: " . $row["gender"] . "<br>" .
                     "Marital Status: " . $row["married"] . "<br>" .
                     "Address: " . $row["address"] . "<br>" .
                     "E-mail: " . $row["email"] . "<br>" .
                     "Phone Number: " . $row["phonenumber"] . "<br>" .
                     "S.S.N: " . $row["ssn"] . "<br>" .
                     "Emergency Contact Name: " . $row["ecname"] . "<br>" .
                     "Emergency Contact Phone Number: " . $row["ecphonenumber"] . "<br>" .
                     "Emergency Contact Relation: " . $row["ecrelation"] . "<br>";
            }
        } else {
            echo "0 results";
        }
        ?>
        <form action="SearchEdit.php" method="post">
            <input type="hidden" name="patientid" value="<?php echo $patientid;?>"/>
            <input type="hidden" name="employeeid" value="<?php echo $_POST['employeeid'];?>" />
            <div id="editbutton"><input type="submit" value="Edit"/></div>
        </form>
        <form action="searchresults.php" method="post">
            <input type="hidden" name="fname" value="<?php echo $pas['firstname'];?>" />
            <input type="hidden" name="lname" value="<?php echo $pas['lastname'];?>" />
            <input type="hidden" name="dob" value="<?php echo $pas["dob"];?>" />
            <input type="hidden" name="employeeid" value="<?php echo $_POST['employeeid'];?>" />
            <div><input type="submit" value="Back"></div>
        </form>
    </body>
</html>
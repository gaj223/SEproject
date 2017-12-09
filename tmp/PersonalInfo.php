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
    </head>
    <body style="background-color:rgb(8, 133, 229);color:White;font-size:30px;">
        <h1 style="color:White;font-size:60px;">Personal Information</h1>
        
        <?php
        //include 'db.emis';
        // Connect to SQL
            $host = "localhost";
            $user = "root";
            $password = "cs3773";
            $database = "EMIS";
            $con = mysqli_connect($host, $user, $password, $database);
            
        if (!$con) {
             exit('Connect Error (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error());
        }
        
        $patientid = $_GET['patientid'];
        //echo "$patientid";
        
        

        $safety = "SELECT * FROM PatientID WHERE PatientLogin REGEXP '[[:<:]]{$patientid}[[:>:]]'";
        $verify = $conn->query($safety);
        $pas = $verify->fetch_assoc();
        

        if (isset($_GET['mstatus'])){
            if ($_GET['mstatus'] != null){
                // $changems = "UPDATE personalinformation SET married = \"" . $_POST['mstatus'] . "\" WHERE lastname LIKE \"%" . $lname . "%\" AND firstname LIKE \"%" . $fname . "%\" AND dob LIKE \"" . $dob . "\"";
                $changems = "UPDATE PatientPersonalInfo SET married = \"" . $_GET['mstatus'] . "\" WHERE PatientID REGEXP '[[:<:]]{$patientid}[[:>:]]'";
                $huh = $conn->query($changems);
                if (!$huh){
                    echo "Error: " . $changems . "<br>" . $conn->error;
                }
            }
        }
        if (isset($_GET['address'])){
            if ($_GET['address'] != null){
                //$changeadd = "UPDATE personalinformation SET address = \"" . $_POST['address'] . "\" WHERE lastname LIKE \"%" . $lname . "%\" AND firstname LIKE \"%" . $fname . "%\" AND dob LIKE \"" . $dob . "\"";
                $changeadd = "UPDATE PatientPersonalInfo SET address = \"" . $_GET['address'] . "\" WHERE PatientID REGEXP '[[:<:]]{$patientid}[[:>:]]'";
                $huh = $conn->query($changeadd);
                if (!$huh){
                    echo "Error: " . $changeadd . "<br>" . $conn->error;
                }
            }
        }
        if (isset($_GET['email'])){
            if ($_GET['email'] != null){
                //$changeem = "UPDATE personalinformation SET email = \"" . $_POST['email'] . "\" WHERE lastname LIKE \"%" . $lname . "%\" AND firstname LIKE \"%" . $fname . "%\" AND dob LIKE \"" . $dob . "\"";
                $changeem = "UPDATE patientpersonalinfo SET email = \"" . $_GET['email'] . "\" WHERE PatientID REGEXP '[[:<:]]{$patientid}[[:>:]]'";
                $huh = $conn->query($changeem);
                if (!$huh){
                    echo "Error: " . $changeem . "<br>" . $conn->error;
                }
            }
        }
        if (isset($_GET['pnumber'])){
            if ($_GET['pnumber'] != null){
                //$changepn = "UPDATE personalinformation SET phonenumber = \"" . $_POST['pnumber'] . "\" WHERE lastname LIKE \"%" . $lname . "%\" AND firstname LIKE \"%" . $fname . "%\" AND dob LIKE \"" . $dob . "\"";
                $changepn = "UPDATE patientpersonalinfo SET phonenumber = \"" . $_GET['pnumber'] . "\" WHERE PatientID REGEXP '[[:<:]]{$patientid}[[:>:]]'";
                $huh = $conn->query($changepn);
                if (!$huh){
                    echo "Error: " . $changepn . "<br>" . $conn->error;
                }
            }
        }
        if (isset($_GET['ecname'])){
            if ($_GET['ecname'] != null){
                //$changeecn = "UPDATE personalinformation SET ecname = \"" . $_POST['ecname'] . "\" WHERE lastname LIKE \"%" . $lname . "%\" AND firstname LIKE \"%" . $fname . "%\" AND dob LIKE \"" . $dob . "\"";
                $changeecn = "UPDATE patientpersonalinfo SET ecname = \"" . $_GET['ecname'] . "\" WHERE PatientID REGEXP '[[:<:]]{$patientid}[[:>:]]'";
                $huh = $conn->query($changeecn);
                if (!$huh){
                    echo "Error: " . $changeecn . "<br>" . $conn->error;
                }
            }
        }
        if (isset($_GET['ecpnumber'])){
            if ($_GET['ecpnumber'] != null){
                //$changeecp = "UPDATE personalinformation SET ecphonenumber = \"" . $_POST['ecpnumber'] . "\" WHERE lastname LIKE \"%" . $lname . "%\" AND firstname LIKE \"%" . $fname . "%\" AND dob LIKE \"" . $dob . "\"";
                $changeecp = "UPDATE patientpersonalinfo SET ecphonenumber = \"" . $_GET['ecpnumber'] . "\" WHERE PatientID REGEXP '[[:<:]]{$patientid}[[:>:]]'";
                $huh = $conn->query($changeecp);
                if (!$huh){
                    echo "Error: " . $changeecp . "<br>" . $conn->error;
                }
            }
        }
        if (isset($_GET['ecrelationship'])){
            if ($_GET['ecrelationship'] != null){
                //$changeecr = "UPDATE personalinformation SET ecrelation = \"" . $_POST['ecrelationship'] . "\" WHERE lastname LIKE \"%" . $lname . "%\" AND firstname LIKE \"%" . $fname . "%\" AND dob LIKE \"" . $dob . "\"";
                $changeecr = "UPDATE patientpersonalinfo SET ecrelation = \"" . $_GET['ecrelationship'] . "\" WHERE PatientID REGEXP '[[:<:]]{$patientid}[[:>:]]'";
                $huh = $conn->query($changeecr);
                if (!$huh){
                    echo "Error: " . $changeecr . "<br>" . $conn->error;
                }
            }
        }

        //$test = "SELECT * FROM personalinformation WHERE lastname LIKE \"%" . $lname . "%\" AND firstname LIKE \"%" . $fname . "%\" AND dob LIKE \"%" . $dob . "%\"";
        $test = "SELECT * FROM PatientPersonalInfo WHERE PatientID REGEXP '[[:<:]]{$patientid}[[:>:]]'";

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
        <form action="edit.html.php" method="post">
            <input type="hidden" name="patientid" value="<?php echo $patientid;?>"/>
            <div><input type="submit" value="Edit"/></div>
        </form>
        <form action="Login.php" method="post">
            <input type="hidden" name="user" value="<?php echo $pas['Email'];?>" />
            <input type="hidden" name="passwrd" value="<?php echo $pas['PassWord'];?>" />
            <div><input type="submit" value="Home"></div>
        </form>
    </body>
</html>



<html>
    <head>
        <title>Personal Information</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
        if (isset($_POST['patientid'])){
        //echo $_POST['patientid'];
            $patientid = $_POST['patientid'];
        }
        ?>
        <h1>Personal Information</h1>
        <form action="PersonalInfo.php" method="get">
            First Name: To change please visit the clinic.<br><br>
            Last Name: To change please visit the clinic.<br><br>
            Gender: To change please visit the clinic.<br><br>
            D.O.B.: To change please visit the clinic.<br><br>
            Marital Status: <input type="text" name="mstatus" /><br><br>
            Address: <input type="text" name="address" /><br><br>
            E-mail Address: <input type="text" name="email" /><br><br>
            Phone Number: <input type="text" name="pnumber" /><br><br>
            SSN: To change please visit the clinic.<br><br>
            Emergency Contact Name: <input type="text" name="ecname" /><br><br>
            Emergency Contact Phone Number: <input type="text" name="ecpnumber" /><br><br>
            Emergency Contact Relationship: <input type="text" name="ecrelationship" /><br><br>
            <input type="hidden" name="patientid" value="<?php echo $patientid;?>"/>
            <input type="submit" />
        </form>  
    </body>
</html>

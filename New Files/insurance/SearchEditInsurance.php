<html>
    <head>
        <title>Insurance Information</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
        echo $_POST['employeeid'];
        if (isset($_POST['patientid'])){
        //echo $_POST['patientid'];
            $patientid = $_POST['patientid'];
        }
        ?>
        <h1>Insurance Information</h1>
        <form action="SearchInsuranceInfo.php" method="post">
            Insurance Provider: <input type="text" name="provider" /><br><br>
            Group Id: <input type="text" name="group" /><br><br>
            Membership Id: <input type="text" name="member" /><br><br>
            <input type="hidden" name="patientid" value="<?php echo $patientid;?>"/>
            <input type="hidden" name="employeeid" value="<?php echo $_POST['employeeid'];?>" />
            <input type="submit" />
        </form>  
    </body>
</html>
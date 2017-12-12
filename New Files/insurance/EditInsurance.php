<html>
    <head>
        <title>Insurance Information</title>
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
        <h1>Insurance Information</h1>
        <form action="InsuranceInfo.php" method="get">
            Insurance Provider: <input type="text" name="provider" /><br><br>
            Group Id: <input type="text" name="group" /><br><br>
            Membership Id: <input type="text" name="member" /><br><br>
            <input type="hidden" name="patientid" value="<?php echo $patientid;?>"/>
            <input type="submit" />
        </form>  
    </body>
</html>
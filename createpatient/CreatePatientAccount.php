<!DOCTYPE html>
<!--
    Creates the Create Patient Account Page
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            body {
                background-color:rgb(21, 118, 221);
                color:white;
                background-image:url("http://www.clker.com/cliparts/0/4/C/O/g/t/doctor-and-patient-blue.svg.med.png");
                background-position: right bottom;
                background-repeat:no-repeat;
                background-attachment:fixed;
            }
            
        </style>
        
    </head>
    <body>
        
        <h1 style="font-size:40px;"> 
            <img src="../Symbol.png" width="60" height="60">
            Create New Patient Account <hr>  
        </h1>
        <p>Personal Information: </p>
        <form action="InsertData.php" method="POST">
            <br>
            <div><label for="gender">Gender:
            <input type="radio" name="gender" value="Male" checked> Male 
            <input type="radio" name="gender" value="Female"> Female<br>
            </div>
            <div><label for="first">First Name: 		
            <input type="text" name="first" id="first"></label>
            </div>
            <div><label for="last">Last Name:			
            <input type="text" name="last" id="last"></label>
            </div>
            <div><label for="birth">Date of Birth:		
                    <input type="date" name="birth" id="birth"></label>
            </div>
            <div><label for="mstatus">Marital Status:		
                    <input type="text" name="mstatus" id="mstatus"></label>
            </div>
            <div><label for="address">Address:			
            <input type="text" name="address" id="address"></label>
            </div>
            <div><label for="email">Email:			
            <input type="text" name="email" id="email"></label>
            </div>
            <div><label for="phone">Phone Number:		
            <input type="text" name="phone" id="phone"></label>
            </div>
            <div><label for="ssn">Social Security Number:	
            <input type="number" name="ssn" id="ssn"></label>
            </div>
            <div><label for="ecname">Emergency Contact Name:	
            <input type="text" name="ecname" id="ecname"></label>
            </div>
            <div><label for="ecphone">Emergency Contact Phone Number:
            <input type="text" name="ecphone" id="ecphone"></label>
            </div>
            <div><label for="ecrelation">Emergency Contact Relation:
            <input type="text" name="ecrelation" id="ecrelation"></label>
            </div>
            <br>
            <p>Insurance Information: </p>
            <div><label for="company">Company: 	
            <input type="text" name="company" id="company"></label>
            </div>
            <div><label for="group">Group ID:	
            <input type="text" name="group" id="group"></label>
            </div>
            <div><label for="member">Member ID:	
            <input type="text" name="member" id="member"></label>
            </div>
            <br>
            <p>Login Information: </p>
            <p> Username will be the email.
            <div><label for="passwrd">Password:			
            <input type="password" name="passwrd" id="passwrd"></label>
            </div>
            <div><label for="SQuest1">Security Question 1:	
            <input type="text" name="SQuest1" id="SQuest1"></label>
            </div>
            <div><label for="SAns1">Security Answer 1:		
            <input type="text" name="SAns1" id="SAns1"></label>
            </div>
            <div><label for="SQuest2">Security Question 2:	
            <input type="text" name="SQuest2" id="SQuest2"></label>
            </div>
            <div><label for="SAns2">Security Answer 2:		
            <input type="text" name="SAns2" id="SAns2"></label>
            </div>
            <div><input type="submit" value="Submit"></div>
        </form>
        
       
    </body>
</html>


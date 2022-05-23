<?php 
require_once("Include/DB.php");
session_start();
if(!isset($_SESSION["username"]) && empty($_SESSION["username"])) {
    header("location: admin_login.php");
}
if(isset($_POST["Submit"])){

  if(!empty($_POST["EName"]) && ($_POST["SSN"])){

  	$EName = $_POST["EName"];
  	$SSN = $_POST["SSN"];
  	$Dept = $_POST["Dept"];
  	$Salary = $_POST["Salary"];
    $HomeAddress = $_POST["HomeAddress"];
      
    global $ConnectingDB; 
      
  	$sql = "INSERT INTO emp_record(ename,ssn,dept,salary,homeaddress)
              VALUES (:enamE,:ssN,:depT,:salarY,:homeaddresS)";
              
  	        $stmt = $ConnectingDB->prepare($sql); 
  	        $stmt -> bindValue(':enamE',$EName);
  	        $stmt -> bindValue(':ssN',$SSN);
  	        $stmt -> bindValue(':depT',$Dept);
  	        $stmt -> bindValue(':salarY',$Salary);
  	        $stmt -> bindValue(':homeaddresS',$HomeAddress);
  	        $Execute = $stmt->execute();
              if ( $Execute )
               {
  	        	
            header("location:view_from_database.php");
  	           }	        
        }
        else{
            echo '<span class="FieldInfoHeading">Please Add at least Name and Social Security Number</span>';
        }
    }
 ?>

    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Insert Data into Database</title>
            <link rel="stylesheet" href="include/style.css">
        </head>
        <body>
        <div>
            <form  action="Insert_into_Database.php" method="post">
                <fieldset>
                    <legend style="text-align: center;color: blue;">Employee data</legend>
                    <span class="FieldInfo">Employee Name</span><br>
                    <input type="text" name="EName" value=""><br>
                    <span class="FieldInfo">Social Security number</span><br>
                    <input type="text" name="SSN" value=""><br>
                    <span class="FieldInfo">Department</span><br>
                    <input type="text" name="Dept" value=""><br>
                    <span class="FieldInfo">Salary</span><br>
                    <input type="text" name="Salary" value=""><br>
                    <span class="FieldInfo">Home Address:</span><br>
                    <textarea name="HomeAddress" cols="80" rows="8"></textarea><br>
                    <input type="submit" name="Submit" value="Submit your record" placeholder="Text here">
                </fieldset>
            </form>
        </div>
            
        </body>
    </html>
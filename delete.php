<?php 
require_once("Include/DB.php");
$SearchQueryParameter = $_GET["id"]; 
if(isset($_POST["Submit"])){
  
  	$EName = $_POST["EName"];
  	$SSN = $_POST["SSN"];
  	$Dept = $_POST["Dept"];
  	$Salary = $_POST["Salary"];
  	$HomeAddress = $_POST["HomeAddress"];
  	$ConnectingDB;  
  	$sql = "DELETE FROM emp_record WHERE id='$SearchQueryParameter'";
  	        $stmt = $ConnectingDB->query($sql); 
  	        if ($stmt) {
  	        	echo '<script>window.open("View_From_Database.php?id=Record Deleted Successfully","_self")</script>';
  	        }    
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Update Data into Database</title>
	<link rel="stylesheet" href="include/style.css">
</head>
<body>
<?php 
$ConnectingDB;
$sql = "SELECT * FROM emp_record WHERE id='$SearchQueryParameter'";
$stmt = $ConnectingDB->query($sql);
while ($DataRows = $stmt->fetch()) {
  $Id =  $DataRows["id"]; 
  $EName =  $DataRows["ename"]; 
  $SSN =  $DataRows["ssn"];
  $Department =  $DataRows["dept"];
  $Salary =  $DataRows["salary"];
  $HomeAddress = $DataRows["homeaddress"];
}
 ?>
<div>
	<form class="" action="Delete.php?id=<?php echo $SearchQueryParameter; ?>" method="post">
		<fieldset>
			<legend style="text-align: center;" >Employee data</legend>
			<span class="FieldInfo">Employee Name</span><br>
			<input type="text" name="EName" value=" <?php echo $EName; ?> "><br>
			<span class="FieldInfo">Social Security number</span><br>
			<input type="text" name="SSN" value="<?php echo $SSN; ?> "><br>
			<span class="FieldInfo">Department</span><br>
			<input type="text" name="Dept" value="<?php echo $Department; ?> "><br>
			<span class="FieldInfo">Salary</span><br>
			<input type="text" name="Salary" value="<?php echo $Salary; ?> "><br>
			<span class="FieldInfo">Home Address:</span><br>
			<textarea name="HomeAddress" cols="80" rows="8"> <?php echo $HomeAddress; ?> </textarea><br>
			<input type="submit" name="Submit" value="Delete record">
		</fieldset>
	</form>
</div>
	
</body>
</html>
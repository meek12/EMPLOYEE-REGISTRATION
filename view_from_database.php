<?php 
require_once("Include/DB.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>View Data from Database</title>
	<link rel="stylesheet" href="include/style.css">
</head>
<body>
	<h2 class="success"> <?php echo @$_GET["id"]; ?></h2> 
     <!-- this particular div is for searching data from database -->
	<div>
		<fieldset>
			<form class="" action="view_From_Database.php" method="GET">
				<input type="text" name="Search" value="" placeholder="Search by Name or SSN">
				<input type="submit" name="SearchButton" value="Search record">
			</form>
		</fieldset>
	</div><br>

    <?php 
    
	if (isset($_GET["SearchButton"])) {
		global $ConnectingDB;
		$Search = $_GET["Search"];
		$sql = "SELECT * FROM emp_record WHERE ename=:searcH OR ssn=:searcH";
		$stmt=$ConnectingDB->prepare($sql);
		$stmt->bindValue(':searcH',$Search);
		$stmt->execute();
        while ($DataRows = $stmt->fetch()) 
        {
			$Id          =  $DataRows["id"];
			$EName       =  $DataRows["ename"];
			$SSN         =  $DataRows["ssn"];
			$Department  =  $DataRows["dept"];
			$Salary      =  $DataRows["salary"];
            $HomeAddress =  $DataRows["homeaddress"];
            
	?>
			<table width="1000" border="5" align="center">
				<caption>SEARCH RESULT</caption>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>SSN</th>
					<th>Department</th>
					<th>Salary</th>
					<th>Home Address</th>
					<th>Search Again</th>
				</tr>
				<tr>
					<th><?php echo $Id; ?></th>
					<th><?php echo $EName; ?></th>
					<th><?php echo $SSN; ?></th>
					<th><?php echo $Department; ?></th>
					<th><?php echo $Salary; ?></th>
					<th><?php echo $HomeAddress; ?></th>
					<th><a href="view_From_Database.php">Search again</a></th>
				</tr>
			</table>
        <?php 
        } 
	}
	 ?> 
	<table width="1000" border="5" align="center"><br><br><br>  
		<caption>VIEW FROM DATABASE</caption>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>SSN</th>
			<th>Department</th>
			<th>Salary</th>
			<th>HomeAddress</th>
			<th>Update</th>
			<th>Delete</th>
			<th>Insert Here</th>			
		</tr>
<?php  
    global $ConnectingDB; 
    $sql ="SELECT * FROM emp_record";
    $stmt = $ConnectingDB->query($sql); 
    while ($DataRows=$stmt->fetch())
    { 
        $Id          =  $DataRows["id"];       
        $EName       =  $DataRows["ename"];
        $SSN         =  $DataRows["ssn"];
        $Department  =  $DataRows["dept"];
        $Salary      =  $DataRows["salary"];
        $HomeAddress = $DataRows["homeaddress"];
    ?> 
            <tr>
                <td><?php echo $Id;  ?></td>
                <td><?php echo $EName ?></td>
                <td><?php echo $SSN; ?></td>
                <td><?php echo $Department; ?></td>
                <td><?php echo $Salary; ?></td>
                <td><?php echo $HomeAddress; ?></td>
                <td><a href="Update.php?id=<?php echo $Id; ?>">Update</a></td>
                <td><a href="Delete.php?id=<?php echo $Id; ?>">Delete</a></td>
                <td><a href="Insert_into_database.php">Not yet registered?Pls Insert</a></td>			
            </tr>
    <?php 
    } 
    ?>
  </table>
<div>

</div>
	
</body>
</html>
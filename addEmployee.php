<?php include "header.php";

	//print_r($_GET);
	include "config.php";
	// Attempt insert query execution
	$sql = "INSERT INTO employee (FName,LName,EmpContact) VALUES ('{$_GET['fName']}','{$_GET['lName']}','{$_GET['contact']}')";

	if(mysqli_query($conn, $sql)){?>
		<p class= "text-left"><font size =5>	RECORD CREATED SUCCESSFULLY<br/></font></p>
		<p class= "text-left"><font color= "red" size =4>Redirecting to main page<br/></font></p>
	<?php
	} else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
	}
	// Close connection
	mysqli_close($conn);
	header("refresh:5; url=main.php");
	//exit;
 include "footer.php" ?>
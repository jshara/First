<?php 
include "header.php"; 
include "config.php";

$sq = "SELECT* FROM employee where EmpID ='{$_GET['id']}'";
$result = mysqli_query($conn,$sq);
$row= mysqli_fetch_row($result)?>

<form class ="text-center" method = "post">
<p><font size= 5>Please confirm if you would like to delete <br/><?php echo $row[1]." ".$row[2]?>.</font></p>
<p> <button name ="yes">YES</button>   <button name = "no">NO</button></p>
</form>

<?php
if(isset($_POST['yes'])){
	//echo "its workings". $_GET['id'];
	$sql = "DELETE FROM employee where EmpID = '{$_GET['id']}'";
	if(mysqli_query($conn,$sql)){?>
		<p class= "text-center"><font size =5>	RECORD DELETED SUCCESSFULLY<br/></font></p>
		<p class= "text-center"><font color= "red" size =4>Redirecting to main page<br/></font></p>
	<?php
	//echo "Employee".$row[1]." ".$row[2]." with ID number: ".$_GET['id']." has been successfully deleted.";
	}
	else
		echo "Something went wrong, apologies";
	mysqli_close($conn);
	header( "refresh:5;url=main.php" );
}
elseif(isset($_POST['no'])){
	header("Location: main.php");
    exit;
}

include "footer.php";
?>
<?php 
include "header.php"; 
include "config.php";

$sq = "SELECT* FROM employee where EmpID ='{$_GET['id']}'";
$result = mysqli_query($conn,$sq);
$row= mysqli_fetch_row($result);
?>
<form class = "form-group" method = "post">
<div class = "col-xs-3 col-xs-offset-2">
<p>First Name <input type ="text" class ="form-control" name ="fname" value = "<?php echo $row[1]?>" required/></p>
<p>Last Name <input type ="text" class ="form-control" name ="lname" value = "<?php echo $row[2]?>"required/></p>
<p>Contact <input type ="text" class ="form-control" name ="contact" value = "<?php echo $row[3]?>"required/></p>
<p> <button name ="save">SAVE</button>   <button name = "cancel">CANCEL</button></p>
</div>
</form>
<?php
if(isset($_POST['save'])){
	$sql = "UPDATE employee SET FName = '{$_POST['fname']}', LName = '{$_POST['lname']}', EmpContact = '{$_POST['contact']}' WHERE EmpID = '{$_GET['id']}'";
	if(mysqli_query($conn, $sql)){?>
		<p class= "text-left"><font size =5>UPDATE SUCCESSFULLY<br/></font></p>
	<?php
	}
	else{
		echo "There was an error";
	}?>
		<p class= "text-left"><font color= "red" size =4>Redirecting to main page<br/></font></p>
	<?php
	header("refresh:5; url=main.php");
}
elseif(isset($_POST['cancel'])){
	header("Location: main.php");
    exit;
}
include "footer.php";
?>
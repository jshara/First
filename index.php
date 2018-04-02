<?php 
include "header.php";
include "config.php";

if(isset($_POST['login'])){
	$sql = "SELECT * FROM user where userName = '{$_POST['username']}'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_row($result);
	//echo $row[1];
	if($row > 0){
		//echo "value = ".$row[2].$row[1].$row[0];
		if($_POST['password'] ==  $row[2]){
			header("location: main.php");
		}
		else{?>
		<p class= "text-center"><font color= "red" size =4>The password is incorrect<br/></font></p>
		<?php
		}
	}
	else{?>
		<p class= "text-center"><font color= "red" size =4>The username is incorrect<br/></font></p>
		<?php
	}
}
?>

<form class ="form-group" method = "post">
<div class = "col-xs-3 col-xs-offset-2">
<p>User Name<input type ="text" class ="form-control" name ="username" required/></p>
<p>Password<input type ="password" class ="form-control" name ="password" required/></p>
<input type="submit" name ="login" value="LOGIN"/>
</div>
</form>

<?php
include "footer.php";
?>
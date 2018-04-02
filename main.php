	<?php include "header.php"; ?>
	<?php include "config.php"; ?>
	
   <!-- <h1>A Simple Sample Employee</h1><span class="border-1"> </span>-->
	
	<div class="row" >
	
		<div class ="column" align = "center">
		
			<div>
			<form method ="post">
			<input type="search" name="Search" placeholder= "Enter Name" required/>
			<input type="submit" name="submit_search" value ="SEARCH"/>
			</form>
			<form method = "post">
			<input type="submit" name="viewall" value ="VIEW ALL"/>
			</form>
			</div>
			
			<div class="col-md-9 col-md-offset-2">
			<table class ="table table-striped table-hover">
				
				<thead>
					<tr>
						<th width="10%">ID </th>
						<th width="22%">First Name</th>
						<th width="22%">Last Name</th>
						<th width="17%">Contact</th>
						<th width ="19%"> Action </th>
					</tr>
				</thead>
				<body>
				<?php
				if(isset($_POST['submit_search'])){
					//echo "it is WORKING";
					$sql = "SELECT* FROM employee where FName LIKE '%{$_POST['Search']}%' OR LName LIKE '%{$_POST['Search']}%'";
					if($result = mysqli_query($conn, $sql)){
					while ($row=mysqli_fetch_row($result)){?>
						<tr>
							<td><?php printf("%s",$row[0]) ?></td>
							<td><?php printf("%s",$row[1]) ?></td>
							<td><?php printf("%s",$row[2]) ?></td>
							<td><?php printf("%s",$row[3]) ?></td>
							<td><a href = 'delete.php?id=<?php echo $row[0]?>'>Delete</a>/ <a href ='edit.php?id=<?php echo $row[0]?>'>Edit</a></td>
						</tr><?php
					}
				}
				//mysqli_close($conn);
				}
				elseif(!isset($_POST['submit_search']) || isset($_POST['viewall'])){
				$sql = "SELECT* FROM employee";
				if($result = mysqli_query($conn, $sql)){
					while ($row=mysqli_fetch_row($result)){?>
						<tr>
							<td><?php echo $row[0] ?></td>
							<td><?php printf("%s",$row[1]) ?></td>
							<td><?php printf("%s",$row[2]) ?></td>
							<td><?php printf("%s",$row[3]) ?></td>
							<td><a href = 'delete.php?id=<?php echo $row[0]?>'>Delete</a>/ <a href ='edit.php?id=<?php echo $row[0]?>'>Edit</a></td>
						</tr><?php
					}
				}
				mysqli_close($conn);
				}
				?>
				</body>
			</table></div>
		</div>
		
		<div class ="column">
			<div class="col-md-9 col-md-offset-2 container">
			<form class ="form-group" name = "employeeForm" action = "addEmployee.php" method = "get">
				<p>First Name: <input type="text" class ="form-control" name="fName" required/> </p>
				<p>Last  Name: <input type ="text" class ="form-control" name="lName" required/> </p>
				<p>Contact   : <input type="text" class ="form-control" name="contact" required/> </p>
				<p><input type="reset" value="CLEAR" />&nbsp; &nbsp;<input type="submit" name="Submit" value="CREATE" />
			</form>
			</div>
		</div>
	</div>
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script> 
	function confirmationDelete(anchor){
	   var conf = confirm('Are you sure want to delete this record?');
	   if(conf)
		  window.location=anchor.attr("href");
		}</script>

<?php include "footer.php"; ?>
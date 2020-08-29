<?php 
if(isset($update))
{
$sql=mysqli_query($con,"SELECT * FROM admin WHERE username='$admin' AND password='$password' ");
	if(mysqli_num_rows($sql))
	{
		if($new_password==$confirm_password)
		{
		mysqli_query($con,"UPDATE admin SET password='$new_password' WHERE username='$admin' ");
		echo "<h3>Password updated successfully</h3>";
		}
		else
		{
			echo "<h3>New and confirm doesn't match</h3>";
		}
	}
	else
	{
	echo "<h3>Old Password doesn't match</h3>";
	}
	
}
?>
<form method="post" enctype="multipart/form-data">
<table class="table table-bordered table-striped table-responsive table-hover">
	<h1>Update Password</h1><hr>
	<tr>
		<th>Enter Your old Password</th>
		<td><input type="password" name="password" class="form-control" required/></td>
	</tr>
	
	<tr>	
		<th>Enter Your New Password</th>
		<td><input type="password" name="new_password" class="form-control" required/>
		</td>
	</tr>
	
	<tr>	
		<th>Enter Your Confirm Password</th>
		<td><input type="password" name="confirm_password" class="form-control" required/>
		</td>
	</tr>
	
	<tr>
		<td colspan="2" class="text-center">
			<input type="submit" class="btn read-more-button" value="Update Password" name="update" required/>
		</td>
	</tr>
</table> 
</form>
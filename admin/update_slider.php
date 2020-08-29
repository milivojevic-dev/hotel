<?php 
$id=$_GET['id'];
$sql=mysqli_query($con,"SELECT * FROM slider WHERE id='$id' ");
$res=mysqli_fetch_assoc($sql);
$img=$res['image'];
$path="../image/Slider/$img";


if(isset($update))
{
	$imgNew=$_FILES['img']['name'];
	if($imgNew=="")
	{
	$sql="UPDATE slider SET caption='$cap' WHERE id='$id' ";
	}
	else
	{
	$sql="UPDATE slider SET caption='$cap',image='$imgNew' WHERE id='$id' ";
	//delete old image
	unlink($path);
	move_uploaded_file($_FILES['img']['tmp_name'],"../image/Slider/".$_FILES['img']['name']);
	}
	if(mysqli_query($con,$sql))
	{
	header('location:dashboard.php?option=slider');	
	}
	
}
?>
<form method="post" enctype="multipart/form-data">
<table class="table table-bordered table-responsive">
	<tr>
		<th>Caption</th>
		<td><input type="text" name="cap" value="<?php echo $res['caption']; ?>" class="form-control"/></td>
	</tr>
	<tr>	
		<th>Image</th>
		<td><input type="file" name="img" accept="image/*" class="form-control"/>
		<img src="<?php echo $path; ?>" height="100px" width="100px"/>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="submit" class="btn read-more-button" value="Update" name="update"/>
		</td>
	</tr>
</table> 
</form>
<?php 
$id=$_GET['id'];
$sql=mysqli_query($con,"SELECT * FROM rooms WHERE id='$id'");
if($sql === FALSE){
    die (mysqli_error($con));
}
while($res=mysqli_fetch_assoc($sql)) {
    extract($_REQUEST);
    if (isset($update)) {
        mysqli_query($con, "UPDATE rooms SET room_number='$room_number',type='$type',price='$price',details='$details' WHERE id='$id' ");
        header('location:dashboard.php?option=rooms');
    }
}

?>
<h1>Update Room</h1>
<hr>
<form method="post" enctype="multipart/form-data">
<table class="table table-bordered table-responsive">
	<tr>
		<th>Room Number</th>
		<td><input type="text"  name="room_number" value="<?php echo $res['room_number']; ?>"  class="form-control"/>
		</td>
	</tr>
	<tr>
		<th>Room Type</th>
		<td><input type="text" name="type" value="<?php echo $res['type']; ?>"  class="form-control"/>
		</td>
	</tr>
	<tr>
		<th>Price</th>
		<td><input type="text" name="price"  value="<?php echo $res['price']; ?>" class="form-control"/>
		</td>
	</tr>
	<tr>
		<th>Details</th>
		<td><textarea name="details"  class="form-control"><?php echo $res['details']; ?></textarea>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="submit" class="btn read-more-button" value="Update Room Details" name="update"/>
		</td>
	</tr>
</table>
</form>
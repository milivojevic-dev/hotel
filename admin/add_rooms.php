<?php 
if(isset($add))
{
	$sql=mysqli_query($con,"SELECT * FROM rooms WHERE room_number='$room_number'");
	if(mysqli_num_rows($sql))
	{
	echo "this room is already added";	
	}		
	else
	{	
	$img=$_FILES['img']['name'];
	mysqli_query($con,"INSERT INTO rooms VALUES('','$room_number','$type','$price','$details','$img')");
	move_uploaded_file($_FILES['img']['tmp_name'],"../image/rooms/".$_FILES['img']['name']);
	echo "Rooms added successfully";
	}
}
?>
<section class="add-room-section">
    <h1>Add New Room</h1>
    <hr>
    <form method="post" enctype="multipart/form-data">
        <table class="table table-bordered table-responsive">

            <tr>
                <th>Room Number</th>
                <td><input type="text" name="room_number"  class="form-control"/>
                </td>
            </tr>

            <tr>
                <th>Room Type</th>
                <td><input type="text" name="type"  class="form-control"/>
                </td>
            </tr>

            <tr>
                <th>Price</th>
                <td><input type="text" name="price"  class="form-control"/>
                </td>
            </tr>

            <tr>
                <th>Details</th>
                <td><textarea name="details"  class="form-control"></textarea>
                </td>
            </tr>

            <tr>
                <th>Images</th>
                <td><input type="file" name="img"  class="form-control"/>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" class="btn read-more-button" value="Add Room Details" name="add"/>
                </td>
            </tr>
        </table>
    </form>
</section>

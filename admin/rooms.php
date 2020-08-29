<script>
    function delRoom(id) {
        if (confirm("You want to delete this Room ?")) {
            window.location.href = 'delete_room.php?id=' + id;
        }
    }
</script>
<table class="table table-bordered table-responsive table-striped table-hover">
    <h1>Room Details</h1>
    <hr>
    <tr>
        <td colspan="8"><a href="dashboard.php?option=add_rooms" class="btn read-more-button">Add New Rooms</a></td>
    </tr>
    <tr>
        <th>Serial Number</th>
        <th>Image</th>
        <th>Room Number</th>
        <th>Type</th>
        <th>Price</th>
        <th>Details</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    <?php
    $i = 1;
    $sql = mysqli_query($con, "SELECT * FROM rooms");
    while ($res = mysqli_fetch_assoc($sql)) {
        $id = $res['id'];
        $img = $res['image'];
        $path = "../image/rooms/$img";
        ?>
        <tr>
            <td><?php echo $i;
                $i++; ?></td>
            <td><img src="<?php echo $path; ?>" width="50" height="50"/></td>
            <td><?php echo $res['room_number']; ?></td>
            <td><?php echo $res['type']; ?></td>
            <td><?php echo $res['price']; ?></td>
            <td><?php echo $res['details']; ?></td>
            <td class="text-center"><a href="dashboard.php?option=update_room&id=<?php echo $id; ?>">
                    <i class="fa fa-pencil-square-o"></i>
                </a>
            </td>
            <td class="text-center"><a href="#" onclick="delRoom('<?php echo $id; ?>')">
                    <i class="fa fa-trash-o"></i>
                </a>
            </td>
        </tr>
        <?php
    }
    ?>

</table>
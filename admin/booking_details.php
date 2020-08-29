<table class="table table-bordered table-striped table-hover table-responsive">
    <h1>Room Booking Details</h1>
    <hr>
    <tr>
        <th>Serial Number</th>
        <th>Name</th>
        <th>Email</th>
        <th>Mobile Number</th>
        <th>Address</th>
        <th>Room Type</th>
        <th>Check in Date</th>
        <th>Check Out Date</th>
        <th>Occupancy</th>
        <th>Cancel Order</th>
    </tr>

    <?php
    $i = 1;
    $sql = mysqli_query($con, "SELECT * FROM room_booking_details");
    if ($sql === FALSE) {
        die (mysqli_error($con));
    }
    while ($res = mysqli_fetch_assoc($sql)) {
        $room_booking_id = $res['id'];
        ?>
        <tr>
            <td><?php echo $i;
                $i++; ?></td>
            <td><?php echo $res['name']; ?></td>
            <td><?php echo $res['email']; ?></td>
            <td><?php echo $res['phone']; ?></td>
            <td><?php echo $res['address']; ?></td>
            <td><?php echo $res['room_type']; ?></td>
            <td><?php echo $res['check_in_date']; ?></td>
            <td><?php echo $res['check_out_date']; ?></td>
            <td><?php echo $res['occupancy']; ?></td>
            <td><a href="cancel_order.php?booking_id=<?php echo $room_booking_id; ?>"> <i class="fa fa-trash-o"></i>
                </a></td>
        </tr>
        <?php
    }
    ?>
</table>
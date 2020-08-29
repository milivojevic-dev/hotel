<?php
session_start();
error_reporting(1);
include('db_config.php');
$eid = $_SESSION['create_account_logged_in'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Online Hotel.com</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
include('menu-bar.php');
?>
<section class="order-section">
    <h1 class="text-center">Booking Details</h1>
    <div class="container">
        <div class="row">
            <table class="table table-striped table-bordered table-hover table-responsive">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile Number</th>
                    <th>Address</th>
                    <th>Country</th>
                    <th>Room Type</th>
                    <th>Check In Date</th>
                    <th>Check Out Date</th>
                    <th>Occupancy</th>
                    <th>Cancel</th>
                </tr>

                <?php
                $i = 1;
                $sql = mysqli_query($con, "SELECT * FROM room_booking_details");
                if ($sql === FALSE) {
                    die (mysqli_error($con));
                }
                while ($res = mysqli_fetch_assoc($sql)) {
                $room_booking_id = $res['id'];

                    echo "<tr>";
                    echo "<td>" . $res['name'] . "</td>";
                    echo "<td>" . $res['email'] . "</td>";
                    echo "<td>" . $res['phone'] . "</td>";
                    echo "<td>" . $res['address'] . "</td>";
                    echo "<td>" . $res['contry'] . "</td>";
                    echo "<td>" . $res['room_type'] . "</td>";
                    echo "<td>" . $res['check_in_date'] . "</td>";
                    echo "<td>" . $res['check_out_date'] . "</td>";
                    echo "<td>" . $res['occupancy'] . "</td>";
                    echo "<td><a href='cancel_order.php?order_id=$room_booking_id'><i class=\"fa fa-trash-o\"></i></a></td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
</section>
<?php
include('footer.php')
?>
</body>
</html>
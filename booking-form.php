<?php
include('menu-bar.php');
include('db_config.php');
if ($eid == "") {
    header('location:login.php');
}
$sql = mysqli_query($con, "SELECT * FROM room_booking_details WHERE email='$eid' ");
$result = mysqli_fetch_assoc($sql);
//print_r($result);
extract($_REQUEST);
error_reporting(1);
if (isset($savedata)) {
    $sql = mysqli_query($con, "SELECT * FROM room_booking_details WHERE email='$email' AND room_type='$room_type' ");
    if (mysqli_num_rows($sql)) {
        $msg = "<h1>You have already booked this room</h1>";
    } else {

        $sql = "INSERT INTO room_booking_details(name,email,phone,address,city,state,zip,contry,room_type,occupancy,check_in_date,check_out_date) 
  VALUES('$name','$email','$phone','$address','$city','$state','$zip','$country',
  '$room_type','$occupancy','$check_in_date','$check_out_date')";
        if (mysqli_query($con, $sql)) {
            $msg = "<h1>You have Successfully booked this room</h1>
<h2><a href='order.php'>View </a></h2>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Online Hotel.com</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Milivojevic Ivana">
    <meta name="keywords" content="Room, Booking, check, images">
    <meta name="description"
          content="Book free, without any prepayment. Pay at the Hotel. Find the best Price now! Book Free, without any prepayment, pay at Hotel. Lowest Price Guarantee! Easy and Secure payment.">
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
<section class="booking-form-section text-center">
    <h1> BOOKING Form </h1>
    <div class="container">
        <div class="row">
            <?php echo $msg; ?>
            <form class="form-horizontal" method="post">
                <div class="col-sm-6">
                    <div class="form-group">
                        <div class="row">
                            <div class="control-label col-sm-4">
                                <h4> Name :</h4>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" value="<?php echo $result['name']; ?>" readonly="readonly"
                                       class="form-control" name="name" placeholder="Enter Your Frist Name" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="control-label col-sm-4">
                                <h4>Email :</h4>
                            </div>
                            <div class="col-sm-8">
                                <input type="email" value="<?php echo $result['email']; ?>" readonly="readonly"
                                       class="form-control" name="email" placeholder="Enter Your Email-Id" required/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="control-label col-sm-4">
                                <h4>Mobile :</h4>
                            </div>
                            <div class="col-sm-8">
                                <input type="number" value="<?php echo $result['mobile']; ?>" readonly="readonly"
                                       class="form-control" name="phone" placeholder="Type Your Phone Number" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="control-label col-sm-4">
                                <h4>Address :</h4>
                            </div>
                            <div class="col-sm-8">
                                <textarea name="address" class="form-control" readonly="readonly"
                                          placeholder="Enter Your Address"><?php echo $result['address']; ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="control-label col-sm-4">
                                <h4>Country: </h4>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" readonly="readonly"
                                       value="<?php echo $result['country']; ?>" name="city"
                                       placeholder="Enter Your City Name" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="control-label col-sm-4">
                                <h4>State: </h4>
                            </div>
                            <div class="col-sm-8">
                                <input type="hidden" name="state" class="form-control"
                                       placeholder="Enter Your State Name" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="control-label col-sm-4">
                                <h4>Zip: </h4>
                            </div>
                            <div class="col-sm-8">
                                <input type="hidden" name="zip" class="form-control" placeholder="Enter Your Zip Code"
                                       required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <div class="row">
                            <div class="control-label col-sm-5">
                                <h4>Room Type: </h4>
                            </div>
                            <div class="col-sm-7">
                                <select class="form-control" name="room_type" required>
                                    <option>Deluxe Room</option>
                                    <option>Luxurious Suite</option>
                                    <option>Standard Room</option>
                                    <option>Suite Room</option>
                                    <option>Twin Deluxe Room</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <div class="row">
                            <div class="control-label col-sm-5">
                                <h4>check In Date :</h4>
                            </div>
                            <div class="col-sm-7">
                                <input type="date" name="check-in-date" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <div class="row">
                            <div class="control-label col-sm-5">
                                <h4>Check Out Date :</h4>
                            </div>
                            <div class="col-sm-7">
                                <input type="date" name="check-out-date" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <div class="row">
                            <label class="control-label col-sm-5">
                                <h4>Occupancy: </h4>
                            </label>
                            <div class="col-sm-7">
                                <div class="radio-inline"><input type="radio" value="single" name="Occupancy" required>Single
                                </div>
                                <div class="radio-inline"><input type="radio" value="twin" name="Occupancy" required>Twin
                                </div>
                                <div class="radio-inline"><input type="radio" value="double" name="Occupancy" required>Double
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" value="submit" name="save-data" class="btn read-more-button"/>
                </div>
            </form>
            <br>
        </div>
    </div>
</section>
</div>
<?php
include('footer.php')
?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
</body>
</html>

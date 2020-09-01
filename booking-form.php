<?php
session_start();
extract($_REQUEST);
include('db_config.php');
$admin = $_SESSION['user_logged_in'];
if ($admin == "") {
    header('location:pagetemplate-home.php');
}

if (isset($savedata)) {
    $sql = mysqli_query($con, "SELECT * FROM room_booking_details WHERE email='$email_id' AND room_type='$room_type' ");
    if (mysqli_num_rows($sql)) {
        $msg = "<h1>You have already booked this room</h1>";
    } else {
        mysqli_query ($con, "INSERT INTO room_booking_details VALUES('$name','$email_id','$phone','$address','$city','$state','$zip','$country',
  '$room_type','$occupancy','$check_in_date','$check_out_date')");
            $msg = "<h1>You have Successfully booked this room</h1>";
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
<nav class="navbar fixed-top navbar-expand-lg">
    <a href="" class="navbar-brand">
        <div class="logo"></div>
    </a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="index.php" title="Home">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="about.php" title="About">About </a></li>
            <li class="nav-item"><a class="nav-link" href="image-gallery.php" title="Gallery">Gallery </a></li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="logout.php" title="Logout">
                    Logout
                </a>
            </li>
        </ul>
    </div>
</nav>

<section class="booking-form-section text-center">
    <h1> BOOKING Form </h1>
    <div class="container">
            <?php echo $msg; ?>
            <form class="form-horizontal" method="post">
                         <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="row">
                            <div class="control-label col-sm-4">
                                <h4> Name :</h4>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" value="<?php echo $result['name']; ?>"
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
                                <input type="email" value="<?php echo $result['email']; ?>"
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
                                <input type="number" value="<?php echo $result['mobile']; ?>"
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
                                <textarea name="address" class="form-control"
                                          placeholder="Enter Your Address"><?php echo $result['address']; ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="control-label col-sm-4">
                                <h4>City: </h4>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control"
                                       value="<?php echo $result['city']; ?>" name="city"
                                       placeholder="Enter Your City Name" required>
                            </div>
                        </div>
                    </div>

                
                    <div class="form-group">
                        <div class="row">
                            <div class="control-label col-sm-4">
                                <h4>Zip: </h4>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="zip" class="form-control" placeholder="Enter Your Zip Code"
                                       value="<?php echo $result['zip']; ?>" name="zip"
                                     required>
                            </div>
                        </div>
                    </div>
                     <div class="form-group">
                        <div class="row">
                            <div class="control-label col-sm-4">
                                <h4>Country: </h4>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="country" class="form-control" placeholder="Enter Your country name"
                                       value="<?php echo $result['country']; ?>" name="country"
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
            </div>
        </form>
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

<?php
session_start();
extract($_REQUEST);
include('../db_config.php');
$admin = $_SESSION['admin_logged_in'];
if ($admin == "") {
    header('location:pagetemplate-home.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Online Hotel.Com</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="dashboard.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<nav class="navbar fixed-top">
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Welcome <?php echo $admin; ?></a>
    <div id="navbarSupportedContent" class="navbar-collapse collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="dashboard.php?option=admin_profile">Profile</a></li>
            <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
        </ul>
    </div>
</nav>

<section class="dashboard-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="dashboard.php?option=update_password">Update
                            Password</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="dashboard.php?option=rooms">Room</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="dashboard.php?option=booking_details">Booking
                            Details</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="dashboard.php?option=slider">Slider</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="dashboard.php?option=feedback">Feedback</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
                <?php
                @$opt = $_GET['option'];
                if ($opt == "") {
                    include('reports.php');
                } else {
                    if ($opt == "feedback") {
                        include('feedback.php');
                    } else if ($opt == "slider") {
                        include('slider.php');
                    } else if ($opt == "update_slider") {
                        include('update_slider.php');
                    } else if ($opt == "add_slider") {
                        include('add_slider.php');
                    } else if ($opt == "update_password") {
                        include('update_password.php');
                    } else if ($opt == "rooms") {
                        include('rooms.php');
                    } else if ($opt == "add_rooms") {
                        include('add_rooms.php');
                    } else if ($opt == "delete_room") {
                        include('delete_room.php');
                    } else if ($opt == "update_room") {
                        include('update_room.php');
                    } else if ($opt == "booking_details") {
                        include('booking_details.php');
                    } else if ($opt == "user_registration") {
                        include('user_registration.php');
                    } else if ($opt == "admin_profile") {
                        include('admin_profile.php');
                    }
                }
                ?>

            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
<script src="../../assets/js/vendor/holder.min.js"></script>
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Online Hotel.Com</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Milivojevic Ivana">
    <meta name="keywords" content="Room, details, check, images, trip">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
</head>
<body>
<?php
include('menu-bar.php')
?>
<section class="room-details-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-7">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="image/Delux-Room-Single-Bed/delux_img1.jpg" class="thumbnail" alt="img1">
                        </div>

                        <div class="carousel-item">
                            <img src="image/Delux-Room-Single-Bed/delux_img2.jpg" class="thumbnail" alt="im2">
                        </div>

                        <div class="carousel-item">
                            <img src="image/Delux-Room-Single-Bed/delux_img3.jpg" class="thumbnail" alt="im3">
                        </div>

                        <div class="carousel-item">
                            <img src="image/Delux-Room-Single-Bed/delux_img4.jpg" class="thumbnail" alt="img4">
                        </div>

                        <div class="carousel-item">
                            <img src="image/Delux-Room-Single-Bed/delux_img5.jpg" class="thumbnail" alt="img5">
                        </div>

                        <div class="carousel-item">
                            <img src="image/Delux-Room-Single-Bed/delux_img7.jpg" class="thumbnail" alt="img7">
                        </div>
                    </div>
                </div>
                <?php
                include('db_config.php');
                $id = $_GET['id'];
                $sql = mysqli_query($con, "SELECT * FROM rooms WHERE id='$id' ");
                $res = mysqli_fetch_assoc($sql);
                ?>
                <h2 class="room-text-wrap"><?php echo $res['type']; ?></h2>
                <h3 class="room-text-wrap"><?php echo $res['price']; ?></h3>
                <p class="text-justify">
                    <?php echo $res['details']; ?>
                </p>
                <div class="book-wrapper">
                    <h2>Amenities & Facilities</h2>
                    <img src="image/icon/wifi.png" class="img-responsive" />
                    <a href="login.php" class="btn read-more-button">Book Now</a>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4>Room Type</h4>
                    </div>
                    <div class="panel-body-right text-center">
                        <!-- Fetch Mysql Database Select Query Room Details -->
                        <?php
                        include('db_config.php');
                        $sql1 = mysqli_query($con, "SELECT * FROM rooms");
                        while ($result1 = mysqli_fetch_assoc($sql1)) {
                            ?>
                            <a class="room-type" href="room_details.php?room_id=<?php echo $result1['id']; ?>"><?php echo $result1['type']; ?></a>
                        <?php } ?>
                        <!--Fetch Mysql Database Select Query Room Details -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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

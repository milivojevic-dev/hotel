<!DOCTYPE html>
<html lang="en">
<head>
    <title>Online Hotel.Com</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Hotel, reservation, booking, summer, winter, enjoy, rooms, luxury">
    <meta name="description"
          content="Book free, without any prepayment. Pay at the Hotel. Find the best Price now! Book Free, without any prepayment, pay at Hotel. Lowest Price Guarantee! Easy and Secure payment.">
    <meta name="author" content="Milivojevic Ivana">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet"/>
</head>
<body>
<?php
session_start();
error_reporting(1);
include('db_config.php');
include('menu-bar.php')
?>
<!-- Carousel Section -->
<section class="carousel-section">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <?php
            $i = 1;
            $sql = mysqli_query($con, "SELECT * FROM slider");
            while ($slider = mysqli_fetch_assoc($sql)) {
                $slider_img = $slider['image'];
                $slider_cap = $slider['caption'];
                $path = "image/Slider/$slider_img";
                if ($i == 1) {
                    ?>
                    <div class="carousel-item active">
                        <div class="slider-image" style="background-image: url(<?php echo $path ?>)"></div>
                        <div class="carousel-caption">
                            <h2><?php echo $slider_cap; ?></h2>
                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="carousel-item">
                        <div class="slider-image" style="background-image: url(<?php echo $path ?>)"></div>
                        <div class="carousel-caption">
                            <h2><?php echo $slider_cap; ?></h2>
                        </div>
                    </div>

                <?php } ?>
                <?php $i++;
            } ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>

<!-- -->
<section class="room-section">
    <h1 class="text-center">Our Rooms</h1>
    <div class="container text-center">
        <div class="row">
            <?php
            $sql = mysqli_query($con, "SELECT * FROM rooms");
            while ($r_res = mysqli_fetch_assoc($sql)) {
                ?>
                <div class="col-sm-4">
                    <div style="background-image: url(image/rooms/<?php echo $r_res['image']; ?>);"
                         class="room-image"></div>
                    <h4 class="room-title"><?php echo $r_res['type']; ?></h4>
                    <p class="room-description"><?php echo substr($r_res['details'], 0, 100); ?></p>
                    <a href="room_details.php?room_id=<?php echo $r_res['id']; ?>"
                       class="btn read-more-button text-center">Read more</a>
                </div>
            <?php } ?>
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
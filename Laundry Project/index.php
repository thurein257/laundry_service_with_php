<?php
    session_start();
    include('inc/conn.php');


    $query = "SELECT * FROM settings";
    $result = mysqli_query($connection, $query);

    $settings = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $settings[$row['setting_key']] = $row['setting_value'];
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="admin/css/common.css">

<?php include 'inc/link.php'; ?>

</head>
<body>

    <div class="container-fluid">
    <?php include('inc/header.php');?>
        <div class="row">


            <!--slidebar-->
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="img/slider-01.jpg" class="d-block w-100" style="height: 600px; object-fit: cover;">
                    <div class="carousel-caption d-none d-md-block position-absolute top-50 start-10 translate-middle-y">
                        <h2 class="display-1">Laundry Service</h2>
                        <h3 class="display-5">Call Us Today: <a href="tel:7194452808" style="color: #c4fff9;">09773015393 </a></h3>
                        <div class="slide_desc">Hours: Mon – Fri: 10AM – 7PM; Sat – Sun: 10AM – 3PM </div>
                        <div class="slide_button">
                            <a class="slide_link" href="contact.php">Contact Us </a>
                            <a class="slide_link" href="about_us.php">More About us </a>
                        </div>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="img/slider-02.jpg" class="d-block w-100" style="height: 600px; object-fit: cover;">
                        <div class="carousel-caption d-none d-md-block position-absolute top-50 start-10 translate-middle-y">
                        <h2 class="display-1">Laundry Service</h2>
                        <h3 class="display-5">Call Us Today: <a href="tel:7194452808" style="color: #c4fff9;">09773015393 </a></h3>
                        <div class="slide_desc">Hours: Mon – Fri: 10AM – 7PM; Sat – Sun: 10AM – 3PM </div>
                        <div class="slide_button">
                            <a class="slide_link" href="contact.php" >Contact Us </a>
                            <a class="slide_link" href="about_us.php">More About us </a>
                        </div>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="img/slider-03.jpg" class="d-block w-100" style="height: 600px; object-fit: cover;">
                        <div class="carousel-caption d-none d-md-block position-absolute top-50 start-10 translate-middle-y">
                        <h2 class="display-1">Laundry Service</h2>
                        <h3 class="display-5">Call Us Today: <a href="tel:7194452808" style="color: #c4fff9;">09773015393 </a></h3>
                        <div class="slide_desc">Hours: Mon – Fri: 10AM – 7PM; Sat – Sun: 10AM – 3PM </div>
                        <div class="slide_button">
                            <a class="slide_link" href="contact.php">Contact Us </a>
                            <a class="slide_link" href="about_us.php">More About us </a>
                        </div>
                    </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <!--slidebar-->

            <!-- first content-->
            <div class="d-flex justify-content-center align-items-center mt-5">
                <h2 class="text-center">
                    WE ARE PASSIONATE ABOUT LAUNDRY
                </h2>
            </div>
            <div class="container mt-2">
                <div class="row justify-content-center">
                    <div class="col-md-3 justify-content-center">
                        <div class="first_container card text-center p-4" style="height: 400px;">
                            <!-- Centered Icon -->
                            <div class="d-flex justify-content-center mb-3 mt-5">
                                <span class="first_icon">
                                <i aria-hidden="true" class="fa-solid fa-bath mt-4"></i>
                                </span>
                            </div>

                            <!-- Centered Title and Text -->
                            <div class="card_body">
                                <h2 class="box_title">WASHING</h2>
                                <p class="box_des">
                                    We provide our clients with a full range of services. We will fix any malfunction in record time, so you’ll have no worries!
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 justify-content-center">
                        <div class="sec_container card text-center p-4" style="height: 400px;">
                            <!-- Centered Icon -->
                            <div class="d-flex justify-content-center mb-3 mt-5 w-94">
                                <span class="sec_icon">
                                <i aria-hidden="true" class="fa-solid fa-tshirt mt-4"></i>
                                </span>

                            </div>

                            <!-- Centered Title and Text -->
                            <div class="card_body">
                                <h2 class="box_title">DRY CLOTHINGS</h2>
                                <p class="box_des">
                                    We provide our clients with a full range of services. We will fix any malfunction in record time, so you’ll have no worries!
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 justify-content-center">
                        <div class="third_container card text-center p-4" style="height: 400px;">
                            <!-- Centered Icon -->
                            <div class="d-flex justify-content-center mb-3 mt-5 w-94">
                                <span class="third_icon">
                                <i aria-hidden="true" class="fa-solid fa-tools mt-4"></i></br>
                                </span>
                            </div>

                            <!-- Centered Title and Text -->
                            <div class="card_body">
                                <h2 class="box_title">IRONING</h2>
                                <p class="box_des">
                                    We provide our clients with a full range of services. We will fix any malfunction in record time, so you’ll have no worries!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- first content-->

            <!-- second content-->
            <div class="d-flex justify-content-center align-items-center mt-5">
                <h2 class="text-center">
                    HOW IT WORKS: IN 4 EASY STEPS
                </h2>
            </div>
            <div class="d-flex justify-content-center align-items-center mt-3">
                <span class="step_work">
                    With our pickup service now it’s super easy for you to do the laundry!					
                </span>
            </div>

            <div class="container mt-4" style="background-color:#F6F6FA;">
                <div class="row justify-content-center">
                                <!--step img-->
                <div class="col-md-3 bg-white justify-content-center my-2">
                        <div class="card-border-none text-center p-4">
                            <div class="d-flex justify-content-center mb-3 mt-5">
                                <img src="img/order.png">
                            </div>

                            <div class="card-body">
                                <h2 class="step">Your Order</h2>
                                <p class="step_des">
                                    We provide our clients with a full range of services. We will fix any malfunction in record time, so you’ll have no worries!
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 bg-white justify-content-center my-2">
                        <div class="card-border-none text-center p-4">
                            <div class="d-flex justify-content-center mb-3 mt-5">
                                <img src="img/collect.png">
                            </div>

                            <div class="card-body">
                                <h2 class="step">We Collect</h2>
                                <p class="step_des">
                                    We provide our clients with a full range of services. We will fix any malfunction in record time, so you’ll have no worries!
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 bg-white justify-content-center my-2">
                        <div class="card-border-none text-center p-4">
                            <div class="d-flex justify-content-center mb-3 mt-5">
                                <img src="img/clean.png">
                            </div>

                            <div class="card-body">
                                <h2 class="step">We Clean</h2>
                                <p class="step_des">
                                    We provide our clients with a full range of services. We will fix any malfunction in record time, so you’ll have no worries!
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 bg-white justify-content-center my-2">
                        <div class="card-border-none text-center p-4">
                            <div class="d-flex justify-content-center mb-3 mt-5">
                                <img src="img/delivery.png">
                            </div>

                            <div class="card-body">
                                <h2 class="step">Delivery</h2>
                                <p class="step_des">
                                    We provide our clients with a full range of services. We will fix any malfunction in record time, so you’ll have no worries!
                                </p>
                            </div>
                        </div>
                    </div>
                    <!--step img-->

                </div>
            </div>
            <!-- second content-->

                        <!--order-->

            <div class="container">
                <div class="row d-flex justify-content-center" >
                    <div class="card d-flex" style="background-color:#3e1f47;">
                        <div class="card-body d-flex justify-content-around align-items-center my-5">
                            <div>
                                <h5 class="order_title card-title">Simple & convenient See how it works</h5>
                                <p class="order_text card-text">With supporting text below as a natural lead-in to additional content.</p>
                            </div>
                            <a href="service.php" class="order_link"><i aria-hidden="true" class="fas fa-book me-2"></i>Get Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--order-->

            <!--third content-->
            <div class="d-flex justify-content-center align-items-center mt-5">
                <h2 class="text-center">
                    WHY CHOOSE US
                </h2>
            </div>

            <div class="container">
                <div class="row justify-content-center mt-3">

                    <div class="card-border-none m-3" style="width: 18rem;" onclick="window.location.href='about_us.php'">
                        <img src="img/guaranted.png" class="card-img-top py-2">
                        <div class="card-body text-center">
                            <h2 class="step card-title">Guaranted</h2>
                            <p class="step_des card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>

                    <div class="card-border-none m-3" style="width: 18rem;" onclick="window.location.href='about_us.php'">
                        <img src="img/dailyopen.png" class="card-img-top py-2">
                        <div class="card-body text-center">
                            <h5 class="step card-title">Open All Week</h5>
                            <p class="step_des card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>

                    <div class="card-border-none m-3" style="width: 18rem;" onclick="window.location.href='about_us.php'">
                        <img src="img/trustworthy.png" class="card-img-top py-2">
                        <div class="card-body text-center">
                            <h5 class="step card-title">Trustworthy</h5>
                            <p class="step_des card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>

                    <div class="card-border-none m-3" style="width: 18rem;" onclick="window.location.href='about_us.php'">
                        <img src="img/rewards.png" class="card-img-top py-2">
                        <div class="card-body text-center">
                            <h5 class="step card-title">Rewards</h5>
                            <p class="step_des card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>

                </div>
            </div>
            <!--third content-->


            <!--contact-->
            <div class="container bg-dark">
                <div class="row d-flex justify-content-center" >
                    <div class="card d-flex bg-dark">
                        <div class="card-body d-flex justify-content-around align-items-center my-3">
                            <div class="col-md-12 justify-content-center">
                                <div class="row d-flex justify-content-center align-items-center">
                                    <div class="col-md-3 d-flex justify-content-start align-items-center my-2">
                                        <span class="contact_icon">
                                            <i aria-hidden="true" class="fas fa-phone"></i>
                                        </span>
                                        <div class="footer_icon">
                                        <h5 class="card-title">Phone :</h5>
                                        <a href="#"><?= isset($settings['phone_number']) ? $settings['phone_number'] : '' ?></a>

                                        </div>
                                    </div>

                                    <div class="col-md-3 d-flex justify-content-start align-items-center my-2">
                                        <span class="contact_icon">
                                            <i aria-hidden="true" class="fa-solid fa-location-dot"></i>
                                        </span>
                                        <div class="footer_icon">
                                        <h5 class="card-title ps-2">Address :</h5>
                                        <a href="#"><?= isset($settings['address']) ? $settings['address'] : '' ?></a>
                                        </div>
                                    </div>

                                    <div class="col-md-3 d-flex justify-content-start align-items-center my-2">
                                        <span class="contact_icon">
                                            <i aria-hidden="true" class="fa-solid fa-envelope"></i>
                                        </span>
                                        <div class="footer_icon">
                                        <h5 class="card-title ps-2">E-MAIL :</h5>
                                        <a href="#"><?= isset($settings['email']) ? $settings['email'] : '' ?></a>
                                        </div>
                                    </div>

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         
        </div>
    </div>
  <?php include('inc/footer.php');?>
</body>
  <?php include 'admin/inc/script.php'; ?>
</html>
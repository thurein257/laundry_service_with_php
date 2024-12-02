<?php

    include('inc/conn.php');
    include ('inc/function.php');
    adminlogin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Panel - Summary Page</title>
    <?php include('inc/link.php');?>

    <link rel="stylesheet" href="css/common.css">
</head>
<body>

    <div class="container-fulid overflow-hidden">
        <div class="row g-0">
            <?php include('inc/header.php');?>
                <div class="col-10">
                    <nav class="navbar navbar-expand">
                        <div class="container-fluid d-flex flex-row-reverse">
                            <div class="dropdown dropstart">
                                <button class="btn btn-light shadow-none dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person-circle"></i><span class="p-1 d-none d-lg-inline">Accounts</span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="logout.php"><i class="bi bi-box-arrow-in-left p-1"></i>Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>

                    <!-- Search Bar -->
                    <!-- <div class="col-sm-4">
                        <nav class="navbar">
                            <div class="container-fluid">
                                <form class="d-flex">
                                    <input class="form-control me-2 shadow-none" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn shadow-none search-color" style="background-color: #ced4da;" type="submit">Search</button>
                                </form>
                            </div>
                        </nav>
                    </div><hr> -->

                    <!-- Min Navbar -->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active text-dark" aria-current="page" href="dashboard.php">Summary</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="service history.php">History</a>
                            </li>
                        </ul>
                    </div>


                    <!-- Controller State -->
                    <div class="col-sm-12">
                        <div class="d-flex mb-3 mt-3">
                            <h6 class="me-auto p-2">Controller State</h6>
                                <div class="p-2">
                                    <button type="button" class="btn btn-sm position-relative rounded shadow-none" onclick="window.location.href='user.php'" style="background-color: #ced4da;">
                                        User
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill" style="background-color: #ba181b;">
                                            <?php
                                                $notification = "SELECT * FROM user";
                                                $result = mysqli_query($connection, $notification);
                                                $count = mysqli_num_rows($result);
                                                echo $count;
                                            ?>
                                        </span>
                                    </button>
                                </div>

                            <div class="p-2">
                                <button type="button" class="btn btn-sm position-relative rounded shadow-none" onclick="window.location.href='order.php'" style="background-color: #ced4da;">
                                    Order
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill" style="background-color: #ba181b;">
                                        <?php
                                            $notification = "SELECT * FROM order_detail WHERE action = 'Pending' ORDER BY orderid ASC";
                                            $result = mysqli_query($connection, $notification);
                                            $count = mysqli_num_rows($result);
                                            echo $count;
                                        ?>
                                    </span>
                                </button>
                            </div>
                            
                        </div>
                    </div><hr>



                    <div class="row">
                    <!--Add Package-->
                        <div class="col-sm-6 mb-3 mb-sm-0" onclick="window.location.href='service.php'">
                        <img src="image/banner_02.avif" class="card-img-top">
                            <div class="alert alert-primary">
                                <div class="text-center">
                                    <i class="bi bi-plus-circle-fill"></i> Add Package
                                </div>
                            </div><hr>
                        </div>
                    <!--Add Delivery Township-->
                        <div class="col-sm-6" onclick="window.location.href='addDelivery.php'">
                        <img src="image/banner_01.avif" class="card-img-top">
                            <div class="alert alert-primary">
                                <div class="text-center">
                                    <i class="bi bi-plus-circle-fill"></i> Add Delivery Township
                                </div>
                            </div><hr>
                        </div>
                    </div>

    </div>
  </div>
</div>
                   
                </div>

        </div>
    </div>

    <!-- Script Links-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
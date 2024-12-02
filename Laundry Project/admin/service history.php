<?php
    include ('inc/conn.php');
    include ('inc/function.php');
    adminlogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Panel - History Page</title>
    <?php include('inc/link.php');?>

    <link rel="stylesheet" href="css/common.css">
</head>
<body>

    <div class="container-fulid">
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
                    <div class="col-sm-12 mb-3">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active text-dark" aria-current="page" href="dashboard.php">Summary</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="service history.php">History</a>
                            </li>
                        </ul>
                    </div>
                    

                    <!--Managements of Service History Table-->
                    <div class="col-sm-12">
                        <h6 class="me-auto p-2 mb-3">Service History</h6>
                            <div class="card">
                                <div class="table-responsive-md">
                                    <table class="table table-bordered">
                                        <thead class="table-light">
                                        <tr>
                                            <th scope="col" style="width: 5%;">Order ID</th>
                                            <th scope="col" style="width: 10%;">User</th>
                                            <th scope="col" style="width: 10%;">Service</th>
                                            <th scope="col" style="width: 5%;">Extra</th>
                                            <th scope="col" style="width: 20%;">Customer Address</th>
                                            <th scope="col" style="width: 10%;">Delivery</th>
                                            <th scope="col" style="width: 10%;">Pickup Date</th>
                                            <th scope="col" style="width: 10%;">Amount</th>
                                         </tr>
                                        </thead>
                                        <?php
                                            $query = "SELECT * FROM order_detail WHERE action = 'Complete' ORDER BY orderid ASC";
                                            $result = mysqli_query($connection, $query);
                                            while($row = mysqli_fetch_array($result)){
                                                ?>

                                        <tbody>
                                            <tr>
                                                <td scope="row"><?php echo $row['orderid'];?></td>
                                                <td><?php echo $row['username'];?></td>
                                                <td><?php echo $row['service'];?></td>
                                                <td><?php echo $row['extra'] . ' (KG)';?></td>
                                                <td><?php echo $row['address'];?></td>
                                                <td><?php echo $row['delivery'];?></td>
                                                <td><?php echo $row['pickup_date'];?></td>
                                                <td><?php echo $row['totalprice'] . ' MMK';?></td>
                                            </tr>
                                        </tbody>
                                        <?php
                                            }
                                        ?>
                                    </table>
                                </div>
                            </div>  
                    </div><hr>
                </div>

        </div>
    </div>

    <!-- Script Links-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
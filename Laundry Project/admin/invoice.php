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
    <title>Dashboard Panel - Invoice Page</title>
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
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="invoice.php">Invoices</a>
                            </li>
                        </ul>
                    </div>


                    <!-- Invoices Managements Table-->
                    <h6 class="me-auto p-2 mt-3">Invoices Managements</h6>
                    <div class="container-fulid">
                        <div class="row g-0">
                            <div class="col md-8 p-4 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive-lg" style="height: 350px; overflow-y: scroll;">
                                            <table class="table table-bordered">
                                                    <thead class="table-light">
                                                        <tr>
                                                        <th scope="col">Order ID</th>
                                                        <th scope="col">Order Date</th>
                                                        <th scope="col">User</th>
                                                        <th scope="col">Quantity</th>
                                                        <th scope="col">Category</th>
                                                        <th scope="col">Amount</th>
                                                        </tr>
                                                    </thead>

                                                    <?php
                                                        $query = "SELECT * FROM order_detail";
                                                        $result = mysqli_query($connection, $query);
                                                        while($row = mysqli_fetch_array($result)){

                                                        }
                                                    ?>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row"><?php echo $row['orderid']; ?></th>
                                                            <td><?php echo $row['username']; ?></td>
                                                            <td><?php echo $row['service']; ?></td>
                                                            <td><?php echo $row['quantity']; ?></td>
                                                        </tr>
                                                        
                                                    </tbody>
                                            </table>
                                        </div>
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
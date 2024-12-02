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
    <title>Service Panel - Order Page</title>
    <?php include('inc/link.php');?>

</head>
<body>
    <?php
        if(isset($_POST['confirm'])){
            $id = $_POST['orderid'];
            $query = "UPDATE order_detail SET action = 'Confirm' WHERE orderid = '$id'";
            $result = mysqli_query($connection, $query);
            header("location: delivery.php");
            
        }

        if(isset($_POST['cancel'])){
            $id = $_POST['orderid'];
            $query = "DELETE FROM order_detail WHERE orderid = '$id'";
            $result = mysqli_query($connection, $query);

            $_SESSION['message'] = 'Order cancel successfully.';
            $_SESSION['alert_type'] = 'danger';
            header("location: order.php");
        }
    ?>


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


                    
                        <!-- Min Navbar -->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active text-dark" aria-current="page" href="order.php">Order</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="service.php">Service</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="clothes_category.php">Category</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="addDelivery.php">Township</a>
                                </li>
                            </ul>
                        </div>

                    
                    <div class="container mt-2">
                        <table class="table table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" style="width: 5%;">Order ID</th>
                                    <th scope="col" style="width: 10%;">Customer Name</th>
                                    <th scope="col" style="width: 10%;">Service</th>
                                    <th scope="col" style="width: 5%;">Extra</th>
                                    <th scope="col" style="width: 20%;">Customer Address</th>
                                    <th scope="col" style="width: 10%;">Delivery</th>
                                    <th scope="col" style="width: 10%;">Pickup Date</th>
                                    <th scope="col" style="width: 10%;">Amount</th>
                                    <th scope="col" style="width: 10%;">Action</th>
                                </tr>
                            </thead>
                            <?php
                                $query = "SELECT * FROM order_detail WHERE action = 'Pending' ORDER BY orderid ASC";
                                $go_query = mysqli_query($connection,$query);
                                while($row = mysqli_fetch_array($go_query)){

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
                                    <td>
                                        <form action="order.php" method="POST">
                                            <input type="hidden" name="orderid" value="<?php echo $row['orderid']; ?>"/>
                                            <input type="submit" class="btn btn-outline-success btn-sm mb-2" name="confirm" value="Confirm">
                                            <input type="submit" class="btn btn-outline-danger btn-sm" name="cancel" value="Cancel">
                                        </form>
                                    </td>
                                </tr>
                            <?php        
                                }
                            ?>

                            </tbody>
                        </table>
                    </div>


            </div>
        </div>
    </div>

    <!-- Script Links-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>


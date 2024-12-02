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
    <title>Delivery</title>
    <?php include('inc/link.php');?>

    <link rel="stylesheet" href="css/common.css">
</head>
<body>

    <?php
        if(isset($_POST['complete'])){
            $id = $_POST['orderid'];
            $query = "UPDATE order_detail SET action = 'Complete' WHERE orderid = '$id'";
            $result = mysqli_query($connection, $query);
            header("location: service history.php");
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


                    <!-- Alert Box -->
                    <div class="col-sm-4">
                    <?php
                     if(isset($_SESSION['message'])): 
                        ?>
                        <div class="alert alert-<?php echo $_SESSION['alert_type']; ?> alert-dismissible fade show" role="alert">
                            <?php
                                echo  $_SESSION['message'];
                                unset($_SESSION['message']);
                                unset($_SESSION['alert_type']);
                            ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                        endif;
                    ?>
                    </div>

                    <!-- User Login table-->
                    <div class="card border-0 shadow-sm mt-4">
                        <div class="card-body">
                            <div class="table-responsive-lg" style="height: 450px; overflow-y: scroll;">
                                <table class="table table-bordered">
                                    <thead class="sticky-top">
                                        <tr class="table-light">
                                            <th scope="col" width="8%">Order ID</th>
                                            <th scope="col" width="15%">Customer Name</th>
                                            <th scope="col" width="30%">Customer Address</th>
                                            <th scope="col" width="10%">Extra</th>
                                            <th scope="col" width="10%">Pickup Date</th>
                                            <th scope="col" width="10%">Deliery</th>
                                            <th scope="col" width="10%">Action</th>
                                        </tr>
                                    </thead>
                                    <?php
                                        $query = "SELECT * FROM order_detail WHERE action = 'Confirm' ORDER BY orderid ASC";
                                        $result = mysqli_query($connection, $query);
                                        while($row = mysqli_fetch_array($result)){
                                            
                                        ?>

                                    <tbody>
                                        <tr>
                                            <td scope="row"><?php echo $row['orderid'];?></td>
                                            <td><?php echo $row['username'];?></td>
                                            <td><?php echo $row['address'];?></td>
                                            <td><?php echo $row['extra'] . ' (KG)';?></td>
                                            <td><?php echo $row['pickup_date'];?></td>
                                            <td><?php echo $row['delivery'];?></td>
                                            <td>
                                                <form action="delivery.php" method="POST">
                                                    <input type="hidden" name="orderid" value="<?php echo $row['orderid']; ?>"/>
                                                    <input type="submit" class="btn btn-outline-dark btn-sm" name="complete" value="Complete">
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php        
                                        }
                                    ?>
                                </table>
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
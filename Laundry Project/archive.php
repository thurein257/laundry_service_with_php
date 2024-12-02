<?php
    include('inc/conn.php');
    session_start();

    if($_SESSION['username']!='' ){
       
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <?php include('inc/link.php');?>
</head>
<body>
    <?php include('inc/header.php'); ?>

    <div class="container mt-2">
        <!-- Hero Section -->
        <section class="hero-section text-center">
            <div class="container">
            <h1 class="display-6 mb-4">Lonicy Service Order Details</h1>
            </div>
        </section>
        <?php if(empty($_SESSION['username'])): ?>

        <?php
            else:
                $query = "SELECT * FROM order_detail WHERE username = ?";
                $stmt = $connection->prepare($query);
                $stmt->bind_param("s", $_SESSION['username']);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0):
                    while ($row = $result->fetch_assoc()):
                        $orderid = $row['orderid'];
                        $pickup_date = $row['pickup_date'];
                        $service = $row['service'];
                        $extra = $row['extra'];
                        $delivery = $row['delivery'];
                        $action = $row['action'];
                        $username = $row['username'];
                    ?>
        <div class="card">
            <div class="card-header">

                


                <h5>Order ID <?php echo $row['orderid'];?></h5>
                <p>Pickup Date: <?php echo $row['pickup_date']; ?></p>
            </div>
            <div class="card-body">
                <h6 class="card-title">Customer Information</h6>
                <p><strong>Name:</strong> <?php echo $row['username'];?></p>

                <h6 class="card-title mt-4">Service Details</h6>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Service</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $row['service'];?></td>
                            
                        </tr>
                        <tr>
                            <td>Extra <?php echo $row['extra'] . ' (KG)';?></td>

                        </tr>
                        <tr>

                            <td><?php echo $row['delivery'];?></td>

                        </tr>


                    </tbody>

                </table>

                <h6 class="card-title mt-4">Order Status</h6>
                <p><strong>Status:</strong> <?php echo $row['action'];?></p>



            </div>

            <div class="card-footer text-end">
                <a href="user.php" class="btn btn shadow-none">Return to Home</a>
            </div>

        </div>
        <?php
                    endwhile;
                else:
                    echo "<p class='text-danger text-center'>It looks like you haven't placed any orders yet. Explore our collection and make your first purchase today!</p>";
                endif;
            endif;
        ?>



    <?php 
    }
    else{
        header('location:login.php');
    }
    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
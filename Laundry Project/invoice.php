<?php
session_start();
include('inc/conn.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <!-- Invoice Header -->
        <div class="row justify-content-center">

        <div class="col-md-8 card rounded bg-light d-flex align-items-center">
  <h4 class="d-flex justify-content-between align-items-center mb-3">
    <span class="display-6">Order Infromation</span>
    <!-- <span class="badge bg-primary rounded-pill">3</span> -->
  </h4>
  <ul class="list-group mb-3">
    <li class="list-group-item d-flex justify-content-between lh-sm">
      <div>
        <h6 class="my-0">Package Name</h6>
        <?php
            $query = "SELECT * FROM township, order_detail WHERE orderid = ''";
            $result = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($result)){

?>
        <small class="text-muted"><?php echo $row['service'];?></small>

    <?php
            }
    ?>
      </div>

    </li>



  </ul>


</div>

        <!-- Notes Section -->
        <div class="alert alert-light border">
            <h6 class="fw-bold">Notes:</h6>
            <p>Thank you for your business! Please make payment by the due date to avoid late fees.</p>
        </div>

        <!-- Footer -->
        <footer class="text-center py-3 mt-5">
            <p class="text-muted">© 2024 Your Company Name. All Rights Reserved.</p>
        </footer>
    </div>

    <!-- Bootstrap JS (optional but recommended for interactivity) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

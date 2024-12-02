<?php
include('admin/inc/conn.php');
session_start();

$selectedPrice = 0; // Default delivery fee
$extraWeightCost = 0; // Default extra weight cost
$totalPrice = 0; // Default total price

// Fetch category details
if (isset($_GET['cat_id']) && is_numeric($_GET['cat_id'])) {
    $cat_id = intval($_GET['cat_id']);

    $query = "SELECT * FROM category WHERE cat_id = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("i", $cat_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['cat_type'] = $row['cat_type'];
        $_SESSION['price'] = intval($row['price']);
        $_SESSION['category'] = $row['category'];
        $_SESSION['description'] = $row['description'];
    } else {
        die("Category not found.");
    }
} else {
    die("Invalid category ID.");
}

// Handle total price calculation
if (isset($_POST['calculate_total'])) {
    $delivery = $_POST['delivery'] ?? '';
    $extraWeight = $_POST['extra'] ?? 0;
    $packagePrice = $_POST['package_price'] ?? 0;

    if (!empty($delivery)) {
        $stmt = $connection->prepare("SELECT price FROM township WHERE township_name = ?");
        $stmt->bind_param("s", $delivery);
        $stmt->execute();
        $stmt->bind_result($selectedPrice);
        $stmt->fetch();
        $stmt->close();

        $extraWeightCost = is_numeric($extraWeight) ? intval($extraWeight) * 1000 : 0;

        $totalPrice = $selectedPrice + $_SESSION['price'] + $extraWeightCost;
        $_SESSION['total_price'] = $totalPrice;
    } else {
        echo "<script>alert('Please select a delivery option.');</script>";
    }
}

$orderid = $_GET['cat_id'];
$_SESSION['orderid'] = $orderid;

if (isset($_POST['place_order'])) {
    $username = htmlspecialchars($_POST['username'] ?? 'Anonymous');
    $address = htmlspecialchars($_POST['address'] ?? '');
    $delivery = htmlspecialchars($_POST['delivery'] ?? '');
    $pickup_date = $_POST['pickup_date'] ?? '';
    if (empty($pickup_date)) {
        echo "<script>alert('Please select a pickup date.');</script>";
    }
    $userEnteredTotal = $_POST['user_total_price'] ?? 0;

    if ($userEnteredTotal != $_SESSION['total_price']) {
        echo "<script>alert('Total price does not match the calculated amount.');</script>";
    } else {
        $stmt = $connection->prepare(
            "INSERT INTO order_detail (username, service, extra, totalprice, address, action, pickup_date, delivery) VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
        );
        $action = 'Pending';
        $extraWeight = $_POST['extra'] ?? 0;

        $stmt->bind_param(
            "sssissss",
            $username,
            $_SESSION['cat_type'],
            $extraWeight,
            $_SESSION['total_price'],
            $address,
            $action,
            $pickup_date,
            $delivery
        );

        if ($stmt->execute()) {
            unset($_SESSION['total_price']);
            header("Location: archive.php");
            exit();
        } else {
            echo "<script>alert('Order placement failed. Please try again.');</script>";
        }
        $stmt->close();
    }
}

if ($_SESSION['username'] != '') {
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Checkout example · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/checkout/">
    <?php include 'inc/link.php'; ?>


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  </head>
  <body class="bg-light">

  <div class="container">
  <main>
  <!-- Hero Section -->
  <section class="hero-section text-center">
    <div class="container">
      <h1 class="display-4 mb-4">Lonicy Service Order Form</h1>
      <p class="lead mb-5">Welcome to our Laundry Service! Let us take care of your laundry needs with affordable and convenient services.</p>
    </div>
  </section>


<form class="needs-validation" method="post" novalidate>
    <div class="row g-5">
        <div class="col-md-5 col-lg-4 order-md-last">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="display-6">Order Information</span>
            </h4>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                        <h6 class="my-0">Package Name</h6>
                        <small class="text-muted"><?= htmlspecialchars($_SESSION['cat_type'] ?? ''); ?></small>
                    </div>
                    <span class="text-muted"><?= htmlspecialchars($_SESSION['price'] ?? 0); ?> MMK</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                        <h6 class="my-0">Delivery Fee</h6>
                        <small class="text-muted"><?= htmlspecialchars($selectedTownship ?? ''); ?></small>
                    </div>
                    <span class="text-muted"><?= $selectedPrice ? $selectedPrice . ' MMK' : '0 MMK'; ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                        <h6 class="my-0">Extra Weight</h6>
                        <small class="text-muted"></small>
                    </div>
                    <span class="text-muted">
                        <span id="totalPrice" class="text-muted">
                            <?= isset($extraWeightCost) && is_numeric($extraWeightCost) ? number_format($extraWeightCost) . ' MMK' : '0 MMK'; ?>
                        </span>
                    </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total Price (MMK)</span>
                    <strong>
                    <?= number_format((isset($totalPrice) && $totalPrice > 0 ? $totalPrice : ($_SESSION['price'] ?? $_POST['package_price'] ?? 0))) . ' MMK'; ?>
                    </strong>
                </li>
            </ul>
            <button type="submit" name="calculate_total" class="btn btn text-white"  style="background-color: #2b4162;">CALCULATE</button>
        </div>      
        <div class="col-md-7 col-lg-8 card bg-light">
            <h4 class="mb-3"></h4>
            <div class="row g-3">
                <div class="col-sm-6">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control shadow-none" name="username" value="<?= isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : ''; ?>" readonly>
                </div>
                <div class="col-sm-6">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control shadow-none" name="email" value="<?= isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : ''; ?>" readonly>
                </div>
                <div class="col-sm-6">
                    <label class="form-label">Package</label>
                    <input type="text" class="form-control text-center shadow-none" name="cat_type" value="<?= htmlspecialchars($_SESSION['cat_type']); ?>" readonly>
                </div>
                <div class="col-sm-6">
                    <label class="form-label">Phone</label>
                    <input type="number" class="form-control shadow-none" name="phone" value="<?= isset($_SESSION['phone']) ? htmlspecialchars($_SESSION['phone']) : ''; ?>" readonly>
                </div>
                <div class="col-12">
                    <label class="form-label mb-4">Clothes Category</label>
                    <div class="row">
                        <?php
                            $selectedCategories = explode(",", $_SESSION['category'] ?? '');
                            $query = "SELECT * FROM clothes_category";
                            $options = mysqli_query($connection, $query);
                            
                            while ($opt = mysqli_fetch_assoc($options)) {
                                $isChecked = in_array($opt['name'], $selectedCategories) ? 'checked' : '';
                                echo "
                                    <div class='col-md-3 mb-1'>
                                        <label>
                                            <input type='checkbox' name='category[]' value='{$opt['name']}' class='form-check-input shadow-none' id='flexCheckCheckedDisabled' disabled $isChecked>
                                            {$opt['name']}
                                        </label>
                                    </div>";
                            }
                        ?>
                    </div>
                </div>
                <div class="col-md-12 mb-3">
              <label class="form-label">Description</label>
              <textarea class="form-control shadow-none" type="text" name="description" value="" rows="3" readonly><?= htmlspecialchars($row['description']); ?></textarea>
            </div>
                <hr class="my-4">
                <div class="form-group">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="extraService" onclick="toggleExtraService()"/>
                        <label class="form-check-label" for="extraService">Add extra service for the added weight (kg)?</label>
                        <div id="extraServiceInput" style="display: none;">
                            <input type="text" class="form-control mt-4 shadow-none" id="extraWeight" name="extra" value="<?= isset($_POST['extra']) ? htmlspecialchars($_POST['extra']) : ''; ?>" placeholder="Add extra weight at least (e.g. 5 kg)">
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control shadow-none" name="address">
                </div>
                <div class="col-3">
                    <label class="form-label">Delivery</label>
                    <select class="form-select shadow-none" name="delivery">
                        <option value="" selected disabled>Choose...</option>
                        <?php
                            // Fetch all township options
                            $query = "SELECT * FROM township";
                            $result = mysqli_query($connection, $query);
                            if ($result): ?>
                                <?php while ($township = mysqli_fetch_assoc($result)): ?>
                                    <?php if (isset($township['township_name'])): ?>
                                        <?php 
                                            $isSelected = (isset($_POST['delivery']) && $_POST['delivery'] == $township['township_name']) ? 'selected' : ''; 
                                        ?>
                                        <option value="<?= htmlspecialchars($township['township_name'], ENT_QUOTES); ?>" <?= $isSelected; ?>>
                                            <?= htmlspecialchars($township['township_name'], ENT_QUOTES); ?>
                                        </option>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <option value="" disabled>No townships available</option>
                            <?php endif; ?>
                    </select>
                </div>
            </div>
            <div class="row g-3 mb-3 mt-3">
                <div class="col-sm-3">
                    <label class="form-label">Pickup Date</label>
                    <input type="date" class="form-control shadow-none" name="pickup_date" min="<?= date('Y-m-d'); ?>" value="<?= isset($_POST['pickup_date']) ? $_POST['pickup_date'] : ''; ?>">
                </div>

                <div class="col-sm-9">
                    <label class="form-label">Enter Total Price (MMK)</label>
                    <input type="number" class="form-control shadow-none" name="user_total_price" value="<?= isset($_POST['user_total_price']) ? $_POST['user_total_price'] : ''; ?>" placeholder="Enter total price (MMK)" required>
                </div>

            </div>
    

            <hr class="my-4">
            <button type="submit" name="place_order" class="btn btn text-white mt-2" style="background-color: #fb5607;">PLACE ORDER</button>
        </div>
    </div>
</form>


  </main>
</div>
<?php 

    include('inc/footer.php');

}
else{
    header('location:login.php');
}
?>
<script>
              function toggleExtraService() {
                const extraServiceInput = document.getElementById('extraServiceInput');
                if (extraServiceInput.style.display === 'none') {
                  extraServiceInput.style.display = 'block';
                } else {
                  extraServiceInput.style.display = 'none';
                }
              }
            </script>
  </body>
</html>

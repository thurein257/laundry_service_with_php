<?php
session_start();
include('inc/conn.php');

if (isset($_GET['cat_type'])) {

    $cat_type = $_GET['cat_type'];


    $query = "SELECT * FROM category WHERE cat_type = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("s", $cat_type);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();


        $_SESSION['cat_type'] = $row['cat_type'];
        $_SESSION['category'] = $row['category'];
        $_SESSION['price'] = $row['price'];
        $_SESSION['description'] = $row['description'];


        header("Location: order.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service</title>
    <?php include('inc/link.php');?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<style>
    .white-mode {
    text-decoration: none;
    padding: 17px 40px;
    background-color: yellow;
    border-radius: 3px;
    color: black;
    transition: .35s ease-in-out;
    position: absolute;
    left: 15px;
    bottom: 15px
}
a {
    text-decoration: none;
}

.pricingTable {
    text-align: center;
    background: #fff;
    margin: 0 15px;
    box-shadow: 0 0 10px #ababab;
    padding-bottom: 40px;
    border-radius: 10px;
    color: #cad0de;
    transform: scale(0.90);
    transition: all .6s ease 0s
}

.pricingTable:hover {
    transform: scale(0.92);
    z-index: 1
}

.pricingTable .pricingTable-header {
    padding: 40px 0;
    background-color: #c8b8db; 
    border-radius: 10px 10px 50% 50%;
    transition: all .5s ease 0s
}

.pricingTable:hover .pricingTable-header {
    background-color: #e7c6ff;
}

.pricingTable .pricingTable-header i {
    font-size: 50px;
    color: #22223b;
    margin-bottom: 10px;
    transition: all .5s ease 0s
}

.pricingTable .price-value {
    font-size: 35px;
    font-weight: 400;
    color: #22223b;
    transition: all .5s ease 0s
}

.pricingTable .month {
    display: block;
    font-size: 16px;
    color: #000;
}

.pricingTable:hover .month,
.pricingTable:hover .price-value,
.pricingTable:hover .pricingTable-header i {
    color: #22223b;
}

.pricingTable .heading {
    font-size: 24px;
    color: #22223b;
    margin-bottom: 20px;
    text-transform: uppercase
}



.pricingTable .pricingTable-order a {
    display: inline-block;
    font-size: 15px;
    color: #22223b;
    padding: 10px 35px;
    border-radius: 20px;
    background: #c8b8db;
    text-transform: uppercase;
    transition: all .3s ease 0s;
}

.pricingTable .pricingTable-order a:hover {
    background-color: #e7c6ff;
    box-shadow: 0 0 5px #000;
}


@media screen and (max-width:990px) {
    .pricingTable {
        margin: 0 0 20px;
    }
}

    </style>
</head>
<body>
<?php include('inc/header.php'); ?>

        <div class="row row-cols-1 row-cols-md-3 g-4 mt-4">

            <?php
            $query = "SELECT * FROM category";
            $result = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_array($result)) {

            ?>
                <div class="col">
                    <div class="pricingTable card">
                        <div class="pricingTable-header">
                            <i class="fa fa-adjust"></i>
                            <div class="price-value"><?= $row['price'] . ' MMK'; ?> <span class="month">Suitable for everyday laundry needs.</span></div>
                        </div>
                        <h3 class="display-6 text-dark"><?= $row['cat_type']; ?></h3>
                        <div style="height: 150px;">
                            <div class="form-floating mt-3 mb-2">
                                <div class="text-dark text-start p-3 ">
                                    <?php echo $row['description'];?>
                                </div>

                            </div>
                        </div>
                        <?php if(!empty($_SESSION['user_id'])): ?>
                        <div class="pricingTable-order">
                            <input type="hidden" name="service_type" value="<?= $row['cat_id']; ?>">
                            
                            <a href="order.php?cat_id=<?= urlencode($row['cat_id']); ?>" name="order_now">Get Now</a>
                        </div>
                        <?php else: ?>
                            
                        <?php endif; ?>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>

  

</body>
</html>
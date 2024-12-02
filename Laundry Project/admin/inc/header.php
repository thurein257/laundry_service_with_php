<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <?php include('link.php');?>
    <link rel="stylesheet" href="../css/common.css">
</head>
<body>

    <nav class="col-2 pe-3">
        <h4 class="h4 bg-color py-3 text-center">
            <span class="d-none d-lg-inline">
                Lonicy Service
            </span>
        </h4>
        <div class="list-group text-center text-lg-start">
            <span class="list-group-item disable d-none d-lg-block mb-2">
                <small>CONTROLS</small>
            </span>
            <a href="dashboard.php" class="list-group-item list-group-item-action mb-2">
                <i class="bi bi-house-fill"></i>
                <span class="d-none d-lg-inline">Dashboard</span>
            </a>
            <a href="user.php" class="list-group-item list-group-item-action mb-2">
                <i class="bi bi-people-fill"></i>
                <span class="d-none d-lg-inline">Users</span>
            </a>
            <a href="delivery.php" class="list-group-item list-group-item-action mb-2">
                <i class="bi bi-truck"></i>
                <span class="d-none d-lg-inline">Delivery</span>
            </a>
            <a href="report.php" class="list-group-item list-group-item-action mb-2">
                <i class="bi bi-flag-fill"></i>
                <span class="d-none d-lg-inline">Report</span>
            </a>
            <a href="order.php" class="list-group-item list-group-item-action mb-2">
                <i class="bi bi-person-workspace"></i>
                <span class="d-none d-lg-inline">Services</span>
            </a>
            <a href="settings.php" class="list-group-item list-group-item-action mb-2">
                <i class="bi bi-gear-fill"></i>
                <span class="d-none d-lg-inline">Settings</span>
            </a>


        </div>
    </nav>
    
</body>
</html>
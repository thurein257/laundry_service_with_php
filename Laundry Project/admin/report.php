<?php
    include ('inc/conn.php');
    include ('inc/function.php');
    adminlogin();
?>
    <?php
        if (isset($_GET['action']) && $_GET['action'] == 'delete') {
            $reportid = $_GET['rp_id'];
            $query = "DELETE FROM report WHERE rp_id = $reportid";
            $go_query = mysqli_query($connection,  $query);
        
            if ($go_query) {
                $_SESSION['message'] = 'Report deleted successfully.';
                $_SESSION['alert_type'] = 'danger';
            } else {
                echo "Error deleting Report: " . mysqli_error($connection);
            }
        
            header("Location: report.php");
            exit();
        }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <?php include('inc/link.php');?>
</head>
<body>

    <div class="container-fulid">
        <div class="row g-0">
            <?php include('inc/header.php');?>
            <div class="col-md-10">
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

                    <div class="container mt-10" style="padding-top: 40px;">
                        <table class="table table-striped table">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 10%;">Report ID</th>
                                    <th scope="col" style="width: 10%;">User</th>
                                    <th scope="col" style="width: 15%;">Email</th>
                                    <th scope="col" style="width: 15%;">Date</th>
                                    <th scope="col" style="width: 40%;">Report Detail</th>
                                    <th scope="col" style="width: 10%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                                if (isset($_GET['search']) && !empty($_GET['search'])) {
                                    $search=$_GET['search'];
                                    $query="Select * from report where user_id='$search' order by rp_id desc";
                                } else {
                                    $query="Select * from report order by rp_id desc";
                                }
                                
                                  
                                        $go_query=mysqli_query($connection,$query);
                                        while($row=mysqli_fetch_array($go_query))
                                    
                                        {
                                            $reportid=$row['rp_id']; // product table
                                            $username=$row['user_name'];// product table
                                            $email=$row['email'];//category table
                                            $date=$row['datetime'];//product table
                                            $content=$row['rp_content'];//product table

                                            echo "<tr>";
                                            echo "<td>{$reportid}</td>";
                                            echo "<td>{$username}</td>";
                                            echo "<td>{$email}</td>";
                                            echo "<td>{$date}</td>";
                                            echo "<td>{$content}</td>";
                                            echo "<td>
                                                    <a href='report.php?action=delete&rp_id={$reportid}' class='btn btn-outline-danger btn-sm mb-2'>Delete</a>
                                                </td>";
                                            echo "</tr>";
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
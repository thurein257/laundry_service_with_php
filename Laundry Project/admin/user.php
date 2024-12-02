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
    <title>User Page</title>
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

                    <!-- User Login table-->
                    <div class="card border-0 shadow-sm mt-4">
                        <div class="card-body">
                            <div class="table-responsive-lg" style="height: 450px; overflow-y: scroll;">
                                <table class="table table-hover border">
                                    <thead class="sticky-top">
                                        <tr class="bg-dark text-light">
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Profile</th>
                                        </tr>
                                    </thead>
                                        
                                    <tbody>
                                    <?php
                                        $query="SELECT * FROM user";
                                        $go_query=mysqli_query($connection,$query);
                                        while($row=mysqli_fetch_array($go_query))
                                        {
                                            $userid=$row['user_id'];//usertable
                                            $username=$row['username'];
                                            $email=$row['email'];
                                            $address=$row['address'];
                                            $phone=$row['phone'];
                                            $userpf=$row['user_pf'];

                                            echo "<tr>";
                                            echo "<td>{$userid}</td>";
                                            echo "<td>{$username}</td>";
                                            echo "<td>{$email}</td>";
                                            echo "<td>{$address}</td>";
                                            echo "<td>{$phone}</td>";
                                            echo "<td><img src='../img/{$userpf}' style='width: 120px; height: 80px;'></td>";
                                            echo "</tr>";
                                        }

                                        ?>
                                    </tbody>
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
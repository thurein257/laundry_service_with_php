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
    <title>Service Panel - Clothes Category Page</title>
    <?php include('inc/link.php');?>

</head>
<body>
    <?php
        if(isset($_POST['submit'])){
            $name = $_POST['name'];

            if (empty($name)) {
                echo "<script>window.alert('Please Fill.')</script>";
            } else {
                $query = "SELECT * FROM clothes_category WHERE name='$name'";
                $result = mysqli_query($connection, $query);
                $count = mysqli_num_rows($result);
                
                if ($count > 0) {
                    echo "<script>window.alert('This Clothes already exists.')</script>";
                } else {
                    $query = "INSERT INTO clothes_category (name) VALUES ('$name')";
                    $result = mysqli_query($connection, $query);
                    
                    if ($result) {
                        $_SESSION['message'] = 'Category created successfully.';
                        $_SESSION['alert_type'] = 'success';
                    }
                }
            }
        }

        if(isset($_POST['subup'])){
            $id = $_POST['id'];
            $name = $_POST['name'];
            $query = "UPDATE clothes_category SET name = '$name' WHERE id = '$id'";
            $result = mysqli_query($connection, $query);
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

                    
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-body">
                                <div class="mb-3">
                                    <h5 class="card-title m-0 mt-2">Add Clothes Category</h5> 
                                </div>

                                <div class="card-body d-flex algin-items-center justify-content-between mb-3">

                                    <form class="col-4 me-4" method="POST" action="clothes_category.php">
                                        <div class="mb-3">
                                            <label class="form-label">Category Name</label>
                                            <input type="text" name="name" class="form-control shadow-none" required/>
                                        </div>
                                        <div class="d-flex justify-content-md-end">
                                            <button class="btn btn shadow-none text-white" type="submit" name="submit" style="background-color: #70e000;">Submit</button>
                                        </div>
                                    </form>
                                    
                                    
                                    <div class="col-6">
                                        <div class="table-responsive-lg" style="height: 250px; overflow-y: scroll;">
                                            <div class="table-responsive-md">
                                                    <table class="table table-bordered">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th scope="col">ID</th>
                                                                <th scope="col">Category Name</th>
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <?php
                                                            $query = "SELECT * FROM clothes_category";
                                                            $result = mysqli_query($connection, $query);
                                                            while($row = mysqli_fetch_array($result)){
                                                                $id = $row['id'];
                                                                $name = $row['name'];
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $row['id']; ?></td>
                                                                <td><?php echo $row['name']; ?></td>
                                                                <td>
                                                                    <button class="btn btn-outline-dark btn-sm mb-2 shadow-none" data-bs-toggle="modal" data-bs-target="#cateditModal<?php echo $id?>">Edit</button>
                                                                    <a href='service.php?action=delete&cat_id={$catid}' class='btn btn-outline-danger btn-sm mb-2 shadow-none'>Delete</a>
                                                                </td>
                                                            </tr>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="cateditModal<?php echo $id?>" tabindex="-1" aria-labelledby="cateditModal{$id}" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <form action="" method="post">
                                                                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                                                                            <div class="modal-body">
                                                                                <div class="mb-3">
                                                                                    <label class="form-label" for="name<?php echo $id; ?>">Category Name</label>
                                                                                    <input type="text" class="form-control" id="name<?php echo $id; ?>" name="name" value="<?php echo $name; ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="submit" name="subup" class="btn btn" style="background-color: #0fa3b1;">Update</button>
                                                                            </div>
                                                                    </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php
                                                            }
                                                        ?>




                                                        

                                                            

                                                        </tbody>
                                                    </table>
                                            </div>
                                        </div>
                                    </div>



                                </div>


                    </div>
                </div><hr>


            </div>
        </div>
    </div>

    <!-- Script Links-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>


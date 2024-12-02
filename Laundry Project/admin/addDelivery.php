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
    <title>Service Panel - Package Page</title>
    <?php include('inc/link.php');?>

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

                    <!-- Alert Box -->
                    <div class="col-sm-4">
                    <?php
                     if(isset($_SESSION['message'])): 
                        ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php
                                echo  $_SESSION['message'];
                                unset($_SESSION['message']);          
                            ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                     endif
                      ?>
                    </div>
                    
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



                <!--Add township-->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="mb-3">
                            <h5 class="card-title m-0 mt-2 fs-2">Add Township</h5> 
                        </div>

                        <div class="card-body d-flex algin-items-center justify-content-between mb-3">

                            <form class="col me-4" method="POST">
                            <?php
                             if (isset($_POST['address_submit'])){
                                $township_name = $_POST['township_name'];
                                $price = $_POST['price'];

                                if(empty($township_name))
                                {
                                    echo "<script>window.alert('Please Fill.')</script>";
                                }
                                else if(!empty($township_name))//duplicate
                                {
                                    $query = "SELECT * FROM township WHERE township_name='$township_name'";
                                    $result = mysqli_query($connection, $query);
                                    $count = mysqli_num_rows($result);
                                        if($count > 0)
                                        {
                                            echo "<script>window.alert('This Address is already exists.')</script>";
                                        }
                                        else
                                        {
                                            $query = "INSERT INTO township(township_name, price) VALUES('$township_name', '$price')";
                                            $result=mysqli_query($connection, $query);
                                        }
                                }
                                $_SESSION['message'] = 'Your township has been created successfully.';
                             }
                             //update township
                             if(isset($_POST['update_township'])){
                                $townid=$_POST['townid'];
                                $township_name=$_POST['township_name'];
                                $price=$_POST['price'];
                                $query = "UPDATE township SET township_name = '$township_name', price = '$price' WHERE townid= '$townid'";
                                $result=mysqli_query($connection, $query);
                                if($result)
                                {
                                    // header("location:");
                                    // exit();
                                }
                                else
                                {
                                    die('Query Failed'.mysqli_error($connection));
                                }
                             }
                        ?>
                                <div class="mb-3">
                                    <label for="" class="form-label">Township Name</label>
                                    <input type="text" name="township_name" class="form-control shadow-none" required/>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Delivery Price</label>
                                    <input type="text" name="price" class="form-control shadow-none" required/>
                                </div>
                                
                                <div class="d-flex justify-content-md-end">
                                    <button class="btn btn shadow-none text-white" type="submit" name="address_submit" style="background-color: #70e000;">Submit</button>
                                </div>


                            </form>
                            
                            
                            <div class="col">
                                <div class="table-responsive-lg" style="height: 250px; overflow-y: scroll;">
                                    <div class="table-responsive-md">
                                            <table class="table">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">Township Name</th>
                                                        <th scope="col">Delivery Price</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>

                                                    <?php
                                                        $query = "SELECT * FROM township";
                                                        $result = mysqli_query($connection, $query);
                                                        while($row=mysqli_fetch_array($result))
                                                        {
                                                            $townid=$row['townid'];
                                                            $township_name=$row['township_name'];
                                                            $price=$row['price'];

                                                            echo "<tr>
                                                                    <td>{$townid}</td>
                                                                    <td>{$township_name}</td>
                                                                    <td>{$price}</td>
                                                                    <td>
                                                                        <button class='btn btn-outline-dark shadow-none btn-sm mb-2' data-bs-toggle='modal' data-bs-target='#editModal{$townid} '>Edit</button>
                                                                        <a href='addDelivery.php?action=delete&townid={$townid}' class='btn btn-outline-danger shadow-none btn-sm mb-2'>Delete</a>
                                                                    </td>
                                                                </tr>";
                                                    ?>

                                                    <div class="modal fade" id="editModal<?php echo $townid; ?>" tabindex="-1" aria-labelledby="editModalLabel<?php echo $townid; ?>" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editModalLabel<?php echo $townid; ?>">Update Township Address</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <!-- Form to edit address -->
                                                                    <form method="post">
                                                                        <input type="hidden" name="townid" value="<?php echo $townid; ?>">
                                                                        
                                                                        <div class="mb-3">
                                                                            <label for="township_name<?php echo $townid; ?>" class="form-label">Township Name</label>
                                                                            <input type="text" class="form-control" id="township_name<?php echo $townid; ?>" name="township_name" value="<?php echo $township_name; ?>">
                                                                        </div>
                                                                        
                                                                        <div class="mb-3">
                                                                            <label for="price<?php echo $townid; ?>" class="form-label">Delivery Price</label>
                                                                            <input type="text" class="form-control" id="price<?php echo $townid; ?>" name="price" value="<?php echo $price; ?>">
                                                                        </div>

                                                                        

                                                                        <button type="submit" name="update_township" class="btn btn-primary">Update</button>
                                                                    </form>
                                                                </div>
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



                    <!--Delete order-->
                    <?php
                        if (isset($_GET['action']) && $_GET['action'] == 'delete') {
                            $townid = $_GET['townid'];
                            $query = "DELETE FROM township WHERE townid = '$townid'";
                            $go_query = mysqli_query($connection, $query);

                            if ($go_query) {
                                $_SESSION['message'] = 'Category deleted successfully.';

                            } else {
                                echo "Error deleting township: " . mysqli_error($connection);
                            }
                        }
                    ?>
                    
                    


            </div>
        </div>
    </div>

    <!-- Script Links-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>

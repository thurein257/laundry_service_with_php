<?php
    include ('inc/conn.php');
    include ('inc/function.php');
    adminlogin();

    if (isset($_POST['submit_cat'])) {
        $category = isset($_POST['category']) && is_array($_POST['category']) ? $_POST['category'] : [];
        $category_str = implode(",", $category);        
        $description = $_POST['description'];
        $catype = $_POST['cat_type'];
        $price = $_POST['price'];
    
        if (empty($category_str)) {
            echo "<script>window.alert('Please Fill.')</script>";
        } else {
            $query = "SELECT * FROM category WHERE cat_type='$catype'";
            $result = mysqli_query($connection, $query);
            $count = mysqli_num_rows($result);
            
            if ($count > 0) {
                echo "<script>window.alert('This Package already exists.')</script>";
            } else {
                $query = "INSERT INTO category(category, description, cat_type, price) VALUES('$category_str', '$description', '$catype', '$price')";
                $result = mysqli_query($connection, $query);
                
                if ($result) {
                    $_SESSION['message'] = 'Package created successfully.';
                    $_SESSION['alert_type'] = 'success';
                }
            }
        }
    }
    
    if (isset($_POST['update_category'])) {
        $catid = $_POST['cat_id'];
        $category = isset($_POST['category']) && is_array($_POST['category']) ? $_POST['category'] : [];
        $category_str = implode(",", $category); 
        $description = $_POST['description'];
        $catype = $_POST['cat_type'];
        $price = $_POST['price'];
        
        $query = "UPDATE category SET category = '$category_str', description = '$description', cat_type = '$catype', price = '$price' WHERE cat_id = $catid";
        $result = mysqli_query($connection, $query);
        if ($result) {
            $_SESSION['message'] = 'Category updated successfully.';
            $_SESSION['alert_type'] = 'info';
        } else {
            $_SESSION['message'] = "Error updating category: " . mysqli_error($connection);
            $_SESSION['alert_type'] = 'danger';
        }
    
        header("Location: service.php");
        exit();
    }
    
    if (isset($_GET['action']) && $_GET['action'] == 'delete') {
        $catid = $_GET['cat_id'];
        $query = "DELETE FROM category WHERE cat_id = $catid";
        $go_query = mysqli_query($connection, $query);
    
        if ($go_query) {
            $_SESSION['message'] = 'Category deleted successfully.';
            $_SESSION['alert_type'] = 'danger';
        } else {
            $_SESSION['message'] = "Error deleting category: " . mysqli_error($connection);
            $_SESSION['alert_type'] = 'danger';
        }
    
        header("Location: service.php");
        exit();
    }
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
                                <div class="text-end mb-4">
                                    <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#package">
                                        <i class="bi bi-plus-square"></i> Add
                                    </button>
                                </div>

                                <div class="table-responsive-lg vh-100">
                                    <div class="table-responsive-md">
                                        <table class="table table-bordered">
                                            <thead class="table-light">
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Category</th>
                                                    <th scope="col">Description</th>
                                                    <th scope="col">Type</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>

                                            <?php
                                                $query = "SELECT * FROM category ORDER BY cat_id DESC";
                                                $result = mysqli_query($connection, $query);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    $catid = $row['cat_id'];
                                                    $des = $row['description'];
                                                    $type = $row['cat_type'];
                                                    $price = $row['price'];
                                                    $categories = explode(",", $row['category']);
                                                    $categoriesList = implode(", ", $categories);

                                                    echo "<tr>
                                                        <td>{$catid}</td>
                                                        <td>{$categoriesList}</td>
                                                        <td>{$des}</td>
                                                        <td>{$type}</td>
                                                        <td>{$price}</td>
                                                        <td>
                                                            <button class='btn btn-outline-dark btn-sm mb-2 shadow-none' data-bs-toggle='modal' data-bs-target='#editModal{$catid}'>Edit</button>
                                                            <a href='service.php?action=delete&cat_id={$catid}' class='btn btn-outline-danger shadow-none btn-sm mb-2'>Delete</a>
                                                        </td>
                                                    </tr>";
                                                
                                            ?>
                                                <tbody>
                                                <div class="modal fade" id="editModal<?php echo $catid; ?>" tabindex="-1" aria-labelledby="editModalLabel<?php echo $catid; ?>" aria-hidden="true">                                                    <div class="modal-dialog modal-lg">
                                                <form method="POST" action="service.php?action=update&cat_id=<?php echo $catid; ?>">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel<?php echo $catid; ?>">Update Category</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <input type='hidden' name='cat_id' value='<?php echo $catid; ?>' />

                                                        <div class="row">
                                                        <div class="col-12 mb-3">
                                                                <label class="form-label mb-4">Category</label>
                                                                <div class="row">
                                                                    <?php
                                                                        $selectedCategories = explode(",", $row['category']);
                                                                        $query = "SELECT * FROM clothes_category";
                                                                        $options = mysqli_query($connection, $query);
                                                                        
                                                                        while ($opt = mysqli_fetch_assoc($options)) {
                                                                            $isChecked = in_array($opt['name'], $selectedCategories) ? 'checked' : '';
                                                                            echo "
                                                                            <div class='col-md-3 mb-1'>
                                                                                <label>
                                                                                    <input type='checkbox' name='category[]' value='{$opt['name']}' class='form-check-input shadow-none' $isChecked>
                                                                                    {$opt['name']}
                                                                                </label>
                                                                            </div>";
                                                                        }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <label class="form-label">Description</label>
                                                                <textarea class="form-control shadow-none" type="text" name="description" value="" rows="3" required><?php echo $des; ?></textarea>
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="cat_type" class="form-label">Type</label>
                                                                <input type="text" name="cat_type" value="<?php echo $type; ?>" class="form-control" required>
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="price" class="form-label">Price</label>
                                                                <input type="number" name="price" value="<?php echo $price; ?>" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="reset" class="btn btn shadow-none" data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" name="update_category" class="btn btn text-white shadow-none" style="background-color: #70e000;">Save</button>
                                                        </div>
                                                    </div>
                                                </form>

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
                <!-- Add Package Modal -->
                <div class="modal fade" id="package" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form method="POST" action="service.php" autocomplete="off">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Package</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                                <label class="form-label mb-4">Clothes Category</label>
                                                <div class="row">
                                                    <?php
                                                        $query = "SELECT * FROM clothes_category";
                                                        $result = mysqli_query($connection, $query);
                                                        foreach ($result as $opt) {
                                                            echo "<div class='col-md-3 mb-1'>
                                                                <label>
                                                                    <input type='checkbox' name='category[]' value='{$opt['name']}' class='form-check-input shadow-none'/>
                                                                    {$opt['name']}
                                                                </label>
                                                            </div>";
                                                        }
                                                    ?>
                                                </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control shadow-none" type="text" name="description" rows="3" required></textarea>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Type</label>
                                            <input type="text" min="1" name="cat_type" class="form-control shadow-none" required/>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Price</label>
                                            <input type="number" min="1" name="price" class="form-control shadow-none" required/>
                                        </div>
                                    
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="reset" class="btn btn shadow-none" data-bs-dismiss="modal">CANCEL</button>
                                    <button name="submit_cat" type="submit" class="btn btn-white text-white shadow-none" style="background-color: #70e000;">SUBMIT</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>







                    <!--Delete order-->
                    <?php
                        if (isset($_GET['action']) && $_GET['action'] == 'delete') {
                            $catid = $_GET['cat_id'];
                            $query = "DELETE FROM category WHERE cat_id = $catid";
                            $go_query = mysqli_query($connection, $query);

                            if ($go_query) {
                                $_SESSION['message'] = 'Package deleted successfully.';

                            } else {
                                echo "Error deleting category: " . mysqli_error($connection);
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


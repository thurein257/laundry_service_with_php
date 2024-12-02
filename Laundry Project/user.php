<?php
    session_start();
    
    include('inc/conn.php');

    if(isset($_POST['updetail'])){
        $userid = $_POST['user_id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
    
        $query = "UPDATE user SET username = '$username', email = '$email', address = '$address', phone = '$phone' WHERE user_id = '$userid'";
        $result = mysqli_query($connection, $query);
    }


    if (isset($_POST['edit_pic'])) {
        $user_id = $_POST['user_id'];
        $user_pf = $_FILES['user_pf'];
    
        if ($user_pf['error'] == UPLOAD_ERR_OK) {

            if ($user_pf['size'] > 5 * 1024 * 1024) {
                echo "File size exceeds the limit of 5 MB.";
                return; 
            }

            $uploadDir = 'img/';
            $fileName = basename($user_pf['name']);
            $uploadFilePath = $uploadDir . $fileName;


            $fileType = strtolower(pathinfo($uploadFilePath, PATHINFO_EXTENSION));
            $allowedTypes = array('jpg', 'jpeg', 'png');
    
            if (in_array($fileType, $allowedTypes)) {

                if (move_uploaded_file($user_pf['tmp_name'], $uploadFilePath)) {

                    $query = "UPDATE user SET user_pf = '$fileName' WHERE user_id = '$user_id'";
                    $result = mysqli_query($connection, $query);
    
                    if ($result) {
                        $_SESSION['user_pf'] = $fileName;
                        echo "<script>alert('Profile picture updated successfully');</script>";
                    } else {
                        echo "Database update failed: " . mysqli_error($connection);
                    }
                } else {
                    echo "File upload failed.";
                }
            } else {
                echo "Invalid file type. Only JPG, JPEG & PNG files are allowed.";
            }
        } else {
            echo "No file was uploaded or an upload error occurred.";
        }
    }

    if($_SESSION['username']!=''){


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Account Page</title>
    <?php include 'admin/inc/link.php'; ?>
</head>
<style>

.img-account-profile {
    height: 10rem;
}
.rounded-circle {
    border-radius: 50% !important;
}
.card {
    box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
}
.card .card-header {
    font-weight: 500;
}
.card-header:first-child {
    border-radius: 0.35rem 0.35rem 0 0;
}
.card-header {
    padding: 1rem 1.35rem;
    margin-bottom: 0;
    background-color: rgba(33, 40, 50, 0.03);
    border-bottom: 1px solid rgba(33, 40, 50, 0.125);
}
.form-control, .dataTable-input {
    display: block;
    width: 100%;
    padding: 0.875rem 1.125rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1;
    color: #69707a;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #c5ccd6;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.35rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.nav-borders .nav-link.active {
    color: #0061f2;
    border-bottom-color: #0061f2;
}
.nav-borders .nav-link {
    color: #69707a;
    border-bottom-width: 0.125rem;
    border-bottom-style: solid;
    border-bottom-color: transparent;
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
    padding-left: 0;
    padding-right: 0;
    margin-left: 1rem;
    margin-right: 1rem;
}
</style>
<body>
    <?php include('inc/header.php');?>
    <div class="container-xl px-4 mt-4">
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">


                     <img class='img-account-profile rounded mb-2' src='img/<?=$_SESSION['user_pf']?>' alt=''>
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                    <!-- Profile picture upload button-->
                     
                    <button class="btn btn shadow-none" type="submit" data-bs-toggle="modal" data-bs-target="#uploadModal<?php $_SESSION['user_id'];?>" style="background-color: #4ecdc4;">Upload new image</button>
                </div>
            </div>
        </div>
        
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="d-flex card-header algin-items-center justify-content-between">
                    <div class="card-title m-0">Account Details</div>
                        <button type="button" class="btn btn shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#updetail">
                            <i class="bi bi-pencil-square"></i> Edit
                        </button>
                    </div>


                    <?php
                        $user_id = $_SESSION['user_id'];
                        $query = "SELECT * FROM user WHERE user_id = '$user_id'";
                        $result = mysqli_query($connection, $query);


                        if ($result && mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_array($result);
                        }
                        else {
                            $row = array('user_id' => $user_id, 'username' => '', 'email' => '', 'address' => '', 'phone' => ''); // Default values
                        }
                        ?>

                        <!-- User Detail Edit Modal -->
                        <div class="modal fade" id="updetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="modal-title" id="exampleModalLabel"> Edit your information below to keep your profile accurate and personalized.</div>
                                    </div>
                                    <form action="user.php" method="POST">
                                        <div class="modal-body">
                                            <input type='hidden' name='user_id' value='<?php echo htmlspecialchars($row['user_id']); ?>' />
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="small mb-1">Username</label>
                                                    <input class="form-control shadow-none" name="username" type="text" placeholder="Enter your username" value="<?php echo htmlspecialchars($row['username']); ?>">
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="small mb-1">Email</label>
                                                    <input class="form-control shadow-none" name="email" type="text" value="<?php echo htmlspecialchars($row['email']); ?>">
                                                </div>
                                            </div>

                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="small mb-1">Location</label>
                                                    <input class="form-control shadow-none" name="address" type="text" value="<?php echo htmlspecialchars($row['address']); ?>">
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="small mb-1">Phone number</label>
                                                    <input class="form-control shadow-none" name="phone" type="tel" value="<?php echo htmlspecialchars($row['phone']); ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="reset" class="btn btn shadow-none" data-bs-dismiss="modal">CANCEL</button>
                                            <button type="submit" class="btn btn" name="updetail" style="background-color: #4ecdc4;">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                            <?php
                                $user_id = $_SESSION['user_id'];
                                $query = "SELECT * FROM user WHERE user_id = '$user_id'";
                                $result = mysqli_query($connection, $query);


                                if ($result && mysqli_num_rows($result) > 0) {
                                    $row = mysqli_fetch_array($result);
                                }
                                else {
                                    echo "No user data found.";
                                    $row = array('username' => '', 'email' => '', 'address' => '', 'phone' => '');
                                }
                            ?>

                <div class="card-body">
                    <form>
                        <!-- Form Group (username)-->
                        <div class="row gx-3 mb-3">
                            <input type='hidden' name='user_id' value='<?php echo $row['user_id']; ?>' />
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputUsername">Username</label>
                                <input class="form-control shadow-none" id="inputUsername" type="text" placeholder="Enter your username" value="<?php echo $row['username'];?>" readonly>
                            </div>

                            <div class="col-md-6">
                                <label class="small mb-1">Email</label>
                                <input class="form-control shadow-none" id="inputFirstName" type="text" value="<?php echo $row['email'];?>" readonly>
                            </div>
                        </div>

                        <div class="row gx-3 mb-3">

                            <div class="col-md-6">
                                <label class="small mb-1">Location</label>
                                <input class="form-control shadow-none" id="inputLastName" type="text" value="<?php echo $row['address'];?>" readonly>
                            </div>

                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Phone number</label>
                                <input class="form-control shadow-none" id="inputPhone" type="tel" value="<?php echo $row['phone'];?>" readonly>
                            </div>
                        </div>

                        <!-- <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Service Action</label>
                            <input class="form-control shadow-none" id="inputUsername" type="text" value="" readonly>
                        </div> -->

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn shadow-none text-white" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #ba181b;">
                            Logout
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Logging out?</h1>
                                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>"Ready to Log Out? Don't worry, our laundry's always in good hands here!"</p>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="logout.php" class="btn btn shadow-none text-white" style="background-color: #ba181b;">Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


    <!--profile upload Modal -->
    <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Profile Picture</h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>"/>
                            <input type="file" name="user_pf" class="form-control shadow-none" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="edit_pic" class="btn btn shadow-none" style="background-color: #4ecdc4;">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
        if(isset($_POST['logout'])){
            session_start();
            session_destroy();
            header('location: login.php');
        }
    }
    else{
        header('location:login.php');
    }
    ?>
    
</body>
</html>
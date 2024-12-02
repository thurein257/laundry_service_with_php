<?php
session_start();
    include('inc/conn.php');
    include ('inc/function.php');


    if((isset($_SESSION['adminlogin']) && $_SESSION['adminlogin'] == true )){
        header('location: dashboard.php');
        exit;
  
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <?php include('inc/link.php');?>
</head>
<body>
<section class="bg-light mt-3 py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
        <div class="card border border-light-subtle rounded-3 shadow-sm">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Admin Login Panel</h2>


            <form method="POST">
              <div class="row gy-2 overflow-hidden">
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="admin_name" required/>
                    <label class="form-label">Admin Name</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="admin_pass" required/>
                    <label class="form-label">Password</label>
                  </div>
                </div>
                
                <div class="col-12">
                  <div class="d-grid my-3">
                    <button class="btn btn-primary btn-lg" type="submit" name="login">LOGIN</button>
                  </div>
                </div>
                
              </div>
            </form>
            <?php
                if(isset($_POST['login'])){
                    $query = "SELECT * FROM `admin` WHERE `admin_name` = '$_POST[admin_name]' AND `admin_pass` = '$_POST[admin_pass]'";
                    $result = mysqli_query($connection, $query);

                    if(mysqli_num_rows($result) == 1){
                        $_SESSION['adminlogin'] = true;
                        $_SESSION['adminid'] = $row['sr_no'];
                        header('location: dashboard.php');
                    }else{
                        echo '<script>alert ("error", "Login Failed - Invalid Credentails!")</script>';
                    }
                }
            ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    
</body>
</html>


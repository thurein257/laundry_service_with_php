<?php
  require 'admin/inc/conn.php';
  session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include 'admin/inc/link.php'; ?>
  <title>Register</title>
  <style>
    body{
      background: url(img/slider-01.jpg);
      backdrop-filter: 50%;
      background-size: cover;
      background-repeat: no-repeat;
    }

    .wrapper h2{
      color: #79787F;
      text-decoration: solid;
      text-transform: capitalize;
      font-family: "Roboto", Sans-serif;
    }

    .wrapper a{
      text-decoration: none;
      color: blue;
      font-family: "Roboto", Sans-serif;
      font-size: 18px;
      font-weight: 400;
    }
    .wrapper a:hover{
      text-decoration: underline;
      color: #FF683A;
    }

    .wrapper input[submit]:hover{
      color: #676767;
      background-color: whitesmoke;
    }

    .wrapper p{
      color: #79787F;
      font-family: "Roboto", Sans-serif;
      font-size: 18px;
      font-weight: 400;
      line-height: 23px;
    }

  </style>
</head>
<body>
  <div class="container">
    <div class="row my-5">

      <div class="col-lg-4 bg-white m-auto rounded-top wrapper">
        <h2 class="text-center mt-3">Register- Lonicy Service</h2>
        <p class="text-center text-muted lead">Create Your Account.</p>
        <!-- form start -->
        <form method="POST" enctype="multipart/form-data">
        <?php
            $NameError="";
            $EmailError="";
            $PasswordError="";
            $AddressError="";
            $PhoneError="";
            $UserpfError="";
            if(isset($_POST['signup'])){
              $Errors="";
              $username=$_POST['username'];
              $email=$_POST['email'];
              $password=$_POST['password'];
              $cpassword=$_POST['cpass'];
              $address=$_POST['address'];
              $phone=$_POST['phone'];
              $userpf=$_FILES['profile_image']['name'];
              if(empty($username))
              {
                $NameError="Please fill the username";
              }
              if(empty($email))
              {
                $EmailError="Please fill the email";
              }
              if(empty($password) && empty($cpassword))
              {
                $PasswordError="Please fill the password";
              }
              if(empty($address))
              {
                $EmailError="Please fill the address";
              }
              if(empty($phone))
              {
                $EmailError="Please fill the phone";
              }
              if(empty($userpf))
              {
                $UserpfError="Please fill Your Profile";
              }

              if($password!=$cpassword)
              {
                $PasswordError="Passwords must be same!";              
              }
              else if($username!="" && $password!="" && $email!="")
              {
                $query="SELECT * FROM user WHERE email='$email' && password='$password' ";
                $ch_query=mysqli_query($connection,$query);
                $count=mysqli_num_rows($ch_query);
                if($count > 0)
                {
                  echo "<script>window.alert('The account have already exists!')</script>";
                }
              else
              {
                $query="INSERT INTO user(username, email, password, address, phone, user_pf)VALUES('$username','$email', '$password', '$address', '$phone', '$userpf')";
                $go_query=mysqli_query($connection,$query);
                if(!$go_query)
                {
                  die ("QUERY FAILED ".mysqli_error($connection));
                }
                move_uploaded_file($_FILES['profile_image']['tmp_name'],'img/'.$userpf);
                header("location:login.php");
              }
            }
            }
          ?>

          <div class="input-group py-2">
            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
            <input type="text" class="form-control <?php if($NameError != ""): ?> is-invalid <?php endif; ?>" placeholder="Enter Your Name" name="username" value="">
          </div>
          <span class="text-danger"><?= $NameError ?></span>

          <div class="input-group py-2">
            <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
            <input type="email" class="form-control <?php if($EmailError != ""): ?> is-invalid <?php endif; ?>" placeholder="Email" name="email">
          </div>
          <span class="text-danger"><?= $EmailError ?></span>


          <div class="input-group py-2">
            <span class="input-group-text"><i class="bi bi-person-fill-lock"></i></span>
            <input type="password" class="form-control <?php if($PasswordError != ""): ?> is-invalid <?php endif; ?>" placeholder="Password" name="password">
          </div>
          <span class="text-danger"><?= $PasswordError ?></span>


          <div class="input-group py-2">
            <span class="input-group-text"><i class="bi bi-person-fill-lock"></i></span>
            <input type="password" class="form-control <?php if($PasswordError != ""): ?> is-invalid <?php endif; ?>" placeholder="Confirm Password" name="cpass">
          </div>
          <span class="text-danger"><?= $PasswordError ?></span>

          <div class="input-group py-2">
            <span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
            <input type="text" class="form-control <?php if($AddressError != ""): ?> is-invalid <?php endif; ?>" placeholder="Enter The Address" name="address">
          </div>
          <span class="text-danger"><?= $AddressError ?></span>

          <div class="input-group py-2">
            <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
            <input type="text" class="form-control <?php if($PhoneError != ""): ?> is-invalid <?php endif; ?>" placeholder="Enter Your Phone" name="phone">
          </div>
          <span class="text-danger"><?= $PhoneError ?></span>

          <div class="input-group py-2">
            <span class="input-group-text"><i class="bi bi-person-bounding-box"></i></span>
            <input type="file" class="form-control" name="profile_image">
          </div>
          <span class="text-danger"><?= $UserpfError ?></span>

          <div class="d-grid py-2">
            <input type="submit" value="SIGNUP NOW" class="btn btn-success" name="signup">
            <p class="text-center py-2">
              I accept the <a href="use&description.php">Terms And Conditions</a> &amp; <a href="policy.php">Policy</a>
            </p>
            <p class="text-center">
              Already Have Account?&nbsp;<a href="login.php">Login</a>
            </p>
          </div>
        </form>
        <!-- form end -->
      </div>
    </div>
  </div>
</body>
</html>
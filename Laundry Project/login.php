<?php
    include('inc/conn.php');
    session_start();
    if(isset($_POST['loginsub'])){

            $username = $_POST['username'];
            $password = $_POST['password'];

            $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
            $result = mysqli_query($connection, $query);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            if(is_array($row)){
                $_SESSION['username'] = $row['username'];
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['address'] = $row['address'];
                $_SESSION['phone'] = $row['phone'];
                $_SESSION['user_pf'] = $row['user_pf'];

            }else{
                echo '<script>
                        window.location.href = "login.php";
                        alert("Login Failed. Invalid username or password")
                </script>';
            }
        }

        if(isset($_SESSION['username'])){
          header("location: index.php");
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Lonicy Service</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .hero-section {
      background-color: #f8f9fa;
      padding: 50px 0;
    }
    .login-form {
      max-width: 400px;
      margin: auto;
      padding: 30px;
      border-radius: 10px;
      background-color: #fff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    
  </style>
</head>
<body>

  <!-- Hero Section -->
  <section class="hero-section text-center">
    <div class="container">
      <h1 class="display-4 mb-2">Lonicy Service Login</h1>
      <p class="lead mb-2">Welcome back to laundry service account!</p>
    </div>
  </section>

  <!-- Login Form Section -->
  <section class="py-3">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="login-form">
            <h2 class="text-center mb-4">Login</h2>
            <form action="login.php" method="POST">
              <!-- Email Input -->
            
              <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" value="<?php echo (isset($_GET['username']))?$_GET['username']:"" ?>" class="form-control shadow-none"/>
              </div>
              <!-- Password Input -->
              <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control shadow-none">
              </div>
              <!-- Login Button -->
              <div class="d-grid">
                <button type="submit" name="loginsub" class="btn btn shadow-none" style="background-color: #4ecdc4;">Login</button>
              </div>
              <div class="d-grid py-2">
            <p class="text-center py-2">
              I accept the <a href="use&description.php">Terms And Conditions</a> &amp; <a href="policy.php">Policy</a>
            </p>
            <p class="text-center">
              Create an account&nbsp;<a href="register.php">Signup</a>
            </p>
          </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

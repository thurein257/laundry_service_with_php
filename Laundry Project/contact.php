<?php include('inc/conn.php');
session_start();
date_default_timezone_set('Asia/Yangon');

if(isset($_POST['submit']))
{
    $user_id=$_SESSION['user_id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $message=$_POST['message'];
  
    $datetime=date("Y-m-d H:i:s");

  
    $query=mysqli_query ($connection, "Insert into report (user_id, user_name, email, rp_content,datetime) Values ('$user_id', '$name','$email','$message','$datetime')");  
    if($query)
    {
        echo "<script>alert('Your Message is submitted.Thank you for leaving your message.')</script>";
    }
    else
    {
        echo "<script>alert('There is an error.')</script>";
    }
}
if($_SESSION['username'] != ''){
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us Page</title>
    <?php include('inc/link.php');?>
</head>
<body>
    <?php include('inc/header.php');?>
       <!-- Contact 1 - Bootstrap Brain Component -->
       <section class="bg-light py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
        <h2 class="mb-4 display-5 text-center">CONTACT US</h2>
        <p class="text-secondary mb-5 text-center">Drop Us A Message.</p>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row justify-content-lg-center">
      <div class="col-12 col-lg-9">
        <div class="bg-white border rounded shadow-sm overflow-hidden">

          <form method="post" action="">
            <div class="row gy-4 gy-xl-5 p-4 p-xl-5">
              <div class="col-12">
                <label for="name" class="form-label">Your Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="name" name="name" value="" required>
              </div>
              <div class="col-12 col-md-12">
                <label for="email" class="form-label">Email Address<span class="text-danger">*</span></label>
                <div class="input-group">
                  <span class="input-group-text">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                      <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                    </svg>
                  </span>
                  <input type="email" class="form-control" id="email" name="email" value="" required>
                </div>
              </div>
              
              <div class="col-12">
                <label for="message" class="form-label">Message <span class="text-danger">*</span></label>
                <textarea class="form-control" id="message" placeholder="Leave your message in here." name="message" rows="3" required></textarea>
              </div>
              <div class="col-12">
                <div class="d-grid">
                  <button class="btn btn-primary btn-lg" type="submit" name="submit">Submit</button>
                </div>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</section>
<?php include('inc/footer.php');
  }
    else{
        header('location: login.php');
    }?>

</body>
</html>
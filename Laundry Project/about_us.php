<?php
    session_start();
    include('inc/conn.php');
    $query = "SELECT * FROM settings";
    $result = mysqli_query($connection, $query);

    $settings = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $settings[$row['setting_key']] = $row['setting_value'];
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>About Us Page</title>
    <?php include 'inc/link.php'; ?>
    <style>
        .middle-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            /* Optional styling */
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
            padding: 100px; /* Padding around text */
            border-radius: 50px; /* Rounded corners */
        }
        .card-body{
            background-color: #DEB887;
        }
    </style>
</head>
<body>
<?php include('inc/header.php');?>
    <div>
        <div class="card text-bg-dark text-center ">
            <img src="img/P1.jpg" class="card-img" alt="">
                <div class="card-img-overlay middle-text">
                    <h1 class="card-title display-3"><?= isset($settings['slide_title']) ? $settings['slide_title'] : '' ?></h1>
                        <p class="card-text"><?= isset($settings['slide_description']) ? $settings['slide_description'] : '' ?></p>
                </div>
        </div>
    </div>
    

    <div class="row p-3 p-md-5">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="grid text-center">
                <div class="g-col-6">
                    <h1 class="card-title">About Us</h1>
                    <p class="card-text">At Lonicy Clean Laundry, we believe that clean clothes should be effortless. Founded in [Year], we set out to create a laundry service that combines convenience, quality, and exceptional customer care. Our team is dedicated to making your laundry experience as smooth and stress-free as possible.</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="grid text-center">
                <div class="g-col-6">
                    <h1 class="card-title">Our Mission</h1>
                    <p class="card-text">Our mission is simple: to provide the highest quality laundry service while prioritizing sustainability and customer satisfaction. We understand that your time is valuable, which is why we offer a range of services tailored to meet your needs—from wash-and-fold to dry cleaning and express services.</p>
                </div>
            </div>
        </div>
    </div>

        <div class="container mt-5">
            <h1 class="display-4 text-center">Why Choose Us?</h1>
        </div>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-3 d-flex">
            <div class="card">
                <div class="card-body">
                    <p class="card-text"><b>Quality You Can Trust:</b> We use state-of-the-art equipment and eco-friendly detergents to ensure your garments are cleaned to perfection. Our experienced staff takes great care with every item, treating your clothes as if they were their own.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 d-flex">
            <div class="card">
                <div class="card-body">
                    <p class="card-text"><b>Convenience at Your Fingertips:</b> With our easy online booking system and flexible pickup/delivery options, doing laundry has never been easier. Whether you’re a busy professional, a parent, or a student, we’re here to make laundry day hassle-free.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 d-flex">
            <div class="card">
                <div class="card-body">
                    <p class="card-text"><b>Eco-Friendly Practices:</b> We’re committed to protecting the planet. Our green practices include using biodegradable detergents, energy-efficient machines, and reducing water waste wherever possible.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 d-flex">
            <div class="card">
                <div class="card-body">
                    <p class="card-text"><b>Customer-Centric Approach:</b> Your satisfaction is our priority. Our friendly team is always available to answer your questions and address any concerns. We welcome your feedback and strive to continuously improve our services.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="py-3 py-md-5">
  <div class="container">
    <div class="row gy-3 gy-md-4 gy-lg-0 align-items-lg-center">
      <div class="col-12 col-lg-6 col-xl-5">
        <img class="img-fluid rounded" loading="lazy" src="img/P2.avif" alt="About 1">
      </div>
      <div class="col-12 col-lg-6 col-xl-7">
        <div class="row justify-content-xl-center">
          <div class="col-12 col-xl-11">
            <h2 class="mb-3">Join the Lonicy Service Family!</h2>
            <p class="lead fs-4 text-secondary mb-3">We invite you to experience the Lonicy Service difference. Whether you need a one-time service or regular laundry support, we’re here to help. Let us take care of the dirty work while you focus on what you love.</p>
            <p class="mb-5">Thank you for choosing Sparkle Clean Laundry!</p>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
    
    include('inc/footer.php');


?>
</body>
</html>
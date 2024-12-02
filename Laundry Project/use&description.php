<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lonicy Service - Laundry Use and Description</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .hero-section {
      background-color: #f8f9fa;
      padding: 50px 0;
    }
    .feature-icon {
      font-size: 40px;
      color: #007bff;
    }
  </style>
</head>
<body>

  <!-- Hero Section -->
  <section class="hero-section text-center">
    <div class="container">
      <h1 class="display-4 mb-4">Welcome to Lonicy Service</h1>
      <p class="lead mb-5">Your trusted laundry service for a cleaner, fresher wardrobe</p>
      <a href="#description" class="btn btn-primary btn-lg">Learn More</a>
    </div>
  </section>

  <!-- Use and Description Section -->
  <section id="description" class="py-5 bg-light">
    <div class="container">
      <div class="row">
        <!-- Use Section -->
        <div class="col-md-6 mb-4">
          <h2>How It Works</h2>
          <p>Lonicy Service makes laundry easy for you! Here's how it works:</p>
          <ul>
            <li><strong>Step 1:</strong> Sign in and create your account.</li>
            <li><strong>Step 2:</strong> Schedule a pickup time that works for you.</li>
            <li><strong>Step 3:</strong> We clean, fold, and return your laundry fresh and neat!</li>
          </ul>
          <p>We offer flexible service options to fit your lifestyle. From quick washes to deep cleaning, we've got you covered!</p>
        </div>

        <!-- Description Section -->
        <div class="col-md-6 mb-4">
          <h2>About Lonicy Service</h2>
          <p>At <strong>Lonicy Service</strong>, we provide top-quality laundry care with a focus on convenience. Our team handles your clothes with the utmost care, using only the best detergents and washing methods to keep your garments looking their best.</p>
          <p>Our service is quick, reliable, and hassle-free. We provide:</p>
          <ul>
            <li><span class="feature-icon">&#128717;</span> Free Pickup and Delivery</li>
            <li><span class="feature-icon">&#128178;</span> Affordable Pricing</li>
            <li><span class="feature-icon">&#128704;</span> Eco-Friendly Cleaning</li>
            <li><span class="feature-icon">&#128075;</span> Excellent Customer Support</li>
          </ul>
          <p>With Lonicy Service, you can relax while we handle the laundry. Your satisfaction is our priority!</p>
        </div>
      </div>
    </div>
  </section>

  <?php include('inc/footer.php');?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lonicy Service - Policy Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .hero-section {
      background-color: #f8f9fa;
      padding: 50px 0;
    }
  </style>
</head>
<body>

  <!-- Hero Section -->
  <section class="hero-section text-center">
    <div class="container">
      <h1 class="display-4 mb-4">Lonicy Service Policies</h1>
      <p class="lead mb-5">Our policies are designed to provide the best service and customer experience possible.</p>
    </div>
  </section>

  <!-- Policy Content Section -->
  <section class="py-5">
    <div class="container">
      <div class="row">
        <!-- Policy Information -->
        <div class="col-md-12">
          <h2>Terms & Conditions</h2>
          <p>Welcome to Lonicy Service. By using our laundry service, you agree to the following terms and conditions:</p>
          <ul>
            <li><strong>Pickup and Delivery:</strong> We provide free pickup and delivery within a specific radius. Please ensure that your clothes are ready for collection at the designated time.</li>
            <li><strong>Processing Time:</strong> Laundry items will be processed and returned within 2–3 business days, depending on the service selected.</li>
            <li><strong>Items We Do Not Accept:</strong> We do not accept dry-clean-only garments, items with special care instructions, or clothes with excessive stains or damage.</li>
            <li><strong>Pricing:</strong> Prices for our services are subject to change based on garment type and size. We strive to keep our pricing fair and competitive.</li>
            <li><strong>Payment:</strong> Payment must be made before or at the time of delivery. We accept various payment methods, including credit/debit cards and online payments.</li>
          </ul>

          <h2>Privacy Policy</h2>
          <p>We value your privacy and are committed to protecting your personal information. Our privacy policy outlines how we collect, use, and store your data:</p>
          <ul>
            <li><strong>Data Collection:</strong> We collect only the necessary personal information, such as name, address, email, and payment details, to process your orders.</li>
            <li><strong>Data Usage:</strong> Your information is used exclusively for processing your laundry orders, delivering items, and communicating with you about our services.</li>
            <li><strong>Data Protection:</strong> We implement security measures to protect your data from unauthorized access, alteration, or misuse.</li>
            <li><strong>Third Parties:</strong> We do not share your personal information with third parties unless required for processing payments or deliveries.</li>
          </ul>

          <h2>Refund Policy</h2>
          <p>If you are not satisfied with our services, we offer the following refund policy:</p>
          <ul>
            <li><strong>Service Issues:</strong> If your laundry is damaged or not cleaned to your satisfaction, we will reprocess the items at no additional charge or provide a partial refund if necessary.</li>
            <li><strong>Requesting a Refund:</strong> Refund requests must be submitted within 7 days of receiving your laundry. After this period, refunds will be assessed on a case-by-case basis.</li>
          </ul>

          <h2>Cancellation Policy</h2>
          <p>If you need to cancel your order or change the pickup schedule, please review our cancellation policy:</p>
          <ul>
            <li><strong>Cancellations:</strong> You can cancel or modify your order up to 24 hours before the scheduled pickup time without any fees.</li>
            <li><strong>Late Cancellations:</strong> Cancellations made within 24 hours of the pickup time will incur a small fee.</li>
            <li><strong>Missed Pickup:</strong> If you miss a scheduled pickup, a rescheduling fee may apply.</li>
          </ul>
        </div>
      </div>
    </div>
  </section>
<?php include('inc/footer.php');?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Lonicy</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="service.php">Service</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about_us.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
      </ul>

      <?php 
        if(empty($_SESSION['user_id'])): 
        
      ?>
      <div class="d-flex">
        <a href="register.php" class="btn btn-outline-dark me-2">Register</a>
        <a href="login.php" class="btn btn-outline-dark me-2">Login</a>
      </div>
      <?php else: ?>
        <div class="d-flex me-2" onclick="window.location.href='archive.php'">
          <i class="bi bi-archive"></i>
        </div>
      <div class="d-flex" onclick="window.location.href='user.php'">
        <i class="bi bi-person-fill"></i>
      </div>
      <?php endif; ?>
    </div>
  </div>
</nav>
<?php
session_start();
ob_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

require('../sql.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="../assets/img/sfa-logo.png" />
  <title>Forgot Password - FarmEase</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
  integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css "/>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <link rel="stylesheet" href="../assets/css/theme.css" type="text/css">
</head>

<body class="bg-white" id="top">
  <nav id="navbar-main" class="navbar navbar-expand-lg navbar-light fixed-top py-3 bg-light opacity-85">
    <div class="container">
      <a class="navbar-brand" href="../index.php">
        <img class="d-inline-block align-top img-fluid" src="../assets/img/sfa-logo.png" alt="" width="100" />
        <span class="text-theme font-monospace fs-4 ps-2"></span>
      </a>
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item px-2"><a class="nav-link fw-medium" href="../index.php">Home</a></li>
          <li class="nav-item px-2"><a class="nav-link fw-medium" href="../contact.php">Contact</a></li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item px-2"><a class="nav-link fw-medium" href="alogin.php">Login</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <section class="section section-shaped section-lg" style="padding-top: 120px;">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="card card-body bg-gradient-warning">
            <h3 class="text-center mb-4">Forgot Password</h3>
            <p class="text-center text-muted">Enter your email address and we'll send you an OTP to reset your password.</p>
            
            <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong><?php echo htmlspecialchars($_GET['error']); ?></strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php endif; ?>

            <form method="POST" action="aforgot_send_otp.php">
              <div class="form-group">
                <label for="email"><h6 class="text-color font-weight-bold">Email Address</h6></label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
              </div>
              
              <div class="form-group text-center">
                <button type="submit" class="btn btn-success btn-block" name="send_otp">Send OTP</button>
              </div>
              
              <div class="text-center mt-3">
                <a href="alogin.php" class="text-primary">Back to Login</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php ob_end_flush(); ?>


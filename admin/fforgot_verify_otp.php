<?php
session_start();
ob_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

require('../sql.php');

if(!isset($_SESSION['forgot_password_email']) || $_SESSION['forgot_password_type'] != 'farmer'){
    ob_end_clean();
    header("location: fforgot_password.php?error=" . urlencode("Session expired. Please try again."));
    exit;
}

$email = $_SESSION['forgot_password_email'];
ob_end_flush();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="../assets/img/sfa-logo.png" />
  <title>Verify OTP - FarmEase</title>

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
      </a>
    </div>
  </nav>

  <section class="section section-shaped section-lg" style="padding-top: 120px;">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="card card-body bg-gradient-warning">
            <h3 class="text-center mb-4">Verify OTP</h3>
            <p class="text-center text-muted">Enter the OTP sent to <?php echo htmlspecialchars($email); ?></p>
            
            <?php if(isset($_GET['email_error']) && $_GET['email_error'] == 1): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Warning: Email could not be sent. Please check your email or contact support.</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php endif; ?>

            <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong><?php echo htmlspecialchars($_GET['error']); ?></strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php endif; ?>

            <div class="alert alert-danger alert-dismissible fade show text-center" style="display: none;" id="invalid" role="alert">
              <strong class="text-center text-dark">Invalid OTP</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form method="POST" action="fforgot_check_otp.php" id="otpForm">
              <div class="form-group">
                <label for="otp"><h6 class="text-color font-weight-bold">Enter OTP</h6></label>
                <input type="text" class="form-control" id="otp" name="otp" placeholder="Enter OTP" required maxlength="5">
              </div>
              
              <div class="form-group text-center">
                <button type="submit" class="btn btn-success btn-block" name="verify_otp">Verify OTP</button>
              </div>
              
              <div class="text-center mt-3">
                <a href="fforgot_password.php" class="text-primary">Resend OTP</a> | 
                <a href="flogin.php" class="text-primary">Back to Login</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
  // Pre-fill OTP from URL parameter if present
  jQuery(document).ready(function(){
    var urlParams = new URLSearchParams(window.location.search);
    var otp = urlParams.get('otp');
    if(otp){
      jQuery('#otp').val(otp);
    }
  });
  </script>
</body>
</html>


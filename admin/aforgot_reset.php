<?php
session_start();
ob_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);

require('../sql.php');

if(!isset($_SESSION['forgot_password_email']) || !isset($_SESSION['forgot_password_verified']) || $_SESSION['forgot_password_type'] != 'admin'){
    ob_end_clean();
    header("location: aforgot_password.php?error=" . urlencode("Session expired. Please try again."));
    exit;
}

$email = $_SESSION['forgot_password_email'];

if(isset($_POST['reset_password'])){
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    if($password !== $confirm_password){
        $error = "Passwords do not match";
    } elseif(strlen($password) < 6){
        $error = "Password must be at least 6 characters long";
    } else {
        // Hash the new password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // Update password using prepared statement
        $stmt = mysqli_prepare($conn, "UPDATE admin SET password = ?, otp = 0 WHERE email = ?");
        if($stmt){
            mysqli_stmt_bind_param($stmt, "ss", $hashedPassword, $email);
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_close($stmt);
                
                // Clear forgot password session
                unset($_SESSION['forgot_password_email']);
                unset($_SESSION['forgot_password_verified']);
                unset($_SESSION['forgot_password_type']);
                
                ob_end_clean();
                header("location: alogin.php?success=" . urlencode("Password reset successfully! Please login with your new password."));
                exit;
            } else {
                $error = "Failed to update password. Please try again.";
            }
            mysqli_stmt_close($stmt);
        } else {
            $error = "Database error. Please try again.";
        }
    }
}

ob_end_flush();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="../assets/img/sfa-logo.png" />
  <title>Reset Password - FarmEase</title>

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
            <h3 class="text-center mb-4">Reset Password</h3>
            <p class="text-center text-muted">Enter your new password for <?php echo htmlspecialchars($email); ?></p>
            
            <?php if(isset($error)): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong><?php echo htmlspecialchars($error); ?></strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php endif; ?>

            <form method="POST" action="">
              <div class="form-group">
                <label for="password"><h6 class="text-color font-weight-bold">New Password</h6></label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                  </div>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Enter new password" required minlength="6">
                  <div class="input-group-append">
                    <span class="input-group-text" onclick="password_show_hide('password');">
                      <i class="fas fa-eye" id="show_eye_password"></i>
                      <i class="fas fa-eye-slash d-none" id="hide_eye_password"></i>
                    </span>
                  </div>
                </div>
              </div>
              
              <div class="form-group">
                <label for="confirm_password"><h6 class="text-color font-weight-bold">Confirm Password</h6></label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                  </div>
                  <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm new password" required minlength="6">
                  <div class="input-group-append">
                    <span class="input-group-text" onclick="password_show_hide('confirm_password');">
                      <i class="fas fa-eye" id="show_eye_confirm"></i>
                      <i class="fas fa-eye-slash d-none" id="hide_eye_confirm"></i>
                    </span>
                  </div>
                </div>
              </div>
              
              <div class="form-group text-center">
                <button type="submit" class="btn btn-success btn-block" name="reset_password">Reset Password</button>
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
  <script>
  function password_show_hide(fieldId) {
    var x = document.getElementById(fieldId);
    var show_eye = document.getElementById("show_eye_" + fieldId);
    var hide_eye = document.getElementById("hide_eye_" + fieldId);
    hide_eye.classList.remove("d-none");
    if (x.type === "password") {
      x.type = "text";
      show_eye.style.display = "none";
      hide_eye.style.display = "block";
    } else {
      x.type = "password";
      show_eye.style.display = "block";
      hide_eye.style.display = "none";
    }
  }
  </script>
</body>
</html>

